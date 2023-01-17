<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\User;
use App\Models\Language;
use Auth;
use Hash;
use Session;
use App;

class AuthController extends FrontController {
    private const PAGE_SLUG = 'login';
    private static $page;


    public function __construct() {
        self::$page = Page::firstWhere('slug', self::PAGE_SLUG);
    }

    public static function getLogin($lang) {
        $cabinetPage = Page::firstWhere('slug', 'cabinet');

        if(!Auth::check()) {
            $language = Language::firstWhere('title', $lang);
            $data = array_merge(self::getDefaultData($language, self::$page));

            return view('auth.login', $data);
        }

        return redirect()->route($cabinetPage->{ 'alias_'.$lang }, $lang);
    }


    public static function login(Request $request, $lang) {
        App::setLocale($lang);

        $validated = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required|min:4',
        ]);

        $userAlready = User::firstWhere('email', $request->email);

        if($userAlready && $userAlready->social_type === 'google') {
            return back()->with('alert', 'For this user Google registration was used. Please Sign in with Google');
        }

        $page = Page::firstWhere('slug', 'cabinet');
        $language = Language::firstWhere('title', $lang);
        $loginFields = $request->only(['email', 'password']);
        
        if(Auth::attempt($loginFields)) {
            if(Auth::user()->hasVerifiedEmail()) {
                return redirect()->intended(route($page->alias, [$language->title]));
            }

            Auth::logout();
            $user = User::firstWhere('email', $request->email);
            static::emailReVerification($language->title, $user['id']);
            
            // return back()->with('alert', __('auth.email_needs_verifying'));
            return redirect()->route('getVerify', [$lang, $user['id']]);
        }

        return back()->with('alert', __('auth.email_or_pass_incorrect'));
    }


    public static function getRegistration($lang) {
        $cabinetPage = Page::firstWhere('slug', 'cabinet');

        if(!Auth::check()) {
            $page = Page::firstWhere('slug', 'registration');
            $language = Language::firstWhere('title', $lang);
            $data = array_merge(self::getDefaultData($language, $page));

            return view('auth.register', $data);
        }

        return redirect()->route($cabinetPage->{ 'alias_'.$lang }, $lang);
    }


    public static function registration(Request $request, $lang) {
        App::setLocale($lang);


        $validated = $request->validate([
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|min:8',
            'confirmPassword' => 'required|min:8|same:password',
        ]);

        $userAlready = User::firstWhere('email', $request->email);

        if($userAlready && $userAlready->social_type == 'google') {
            return back()->with('alert', 'This email was already used for Google registration. Please Sign in with Google');
        }

        $user = User::create($request->all());

        $language = Language::firstWhere('title', $lang);

        $emailData = [];
        $emailData['email'] = $request->input('email');
        $emailData['language'] = $language->title;
        $emailData['id'] = $user->id;

        MailController::emailVerification($emailData);
        
        return redirect()->route('getVerify', [$language->title, $user->id])->with('alert', __('auth.registerSuccessStatus'));
    }

    public static function getVerify($lang, $id) {
        $page = Page::firstWhere('slug', 'getVerify');
        $language = Language::firstWhere('title', $lang);
        $userId = $id;

        $data = array_merge(self::getDefaultData($language, $page), 
                            [   
                                'resendVerificationPage' => Page::firstWhere('slug', 'resendVerification'),
                                'userId' => $id,
                            ]);
        // return redirect()->route('getLogin', $lang)->with('alert', 'Email was verified successfully');
        return view('auth.verify', $data);
    }


    public static function emailVerification($lang, $id) {
        $page = Page::firstWhere('slug', 'getVerify');
        $language = Language::firstWhere('title', $lang);

        $user = User::firstWhere('id', $id);
        $user->email_verified_at = date("Y-m-d H:i:s", strtotime('+4 hours'));
        $user->save();

        return redirect()->route('getLogin', $lang)->with('alert', 'Email was verified successfully');
    }

    public static function emailReVerification($lang, $id) {
        $page = Page::firstWhere('slug', 'getVerify');
        $language = Language::firstWhere('title', $lang);

        $user = User::firstWhere('id', $id);

        if(isset($user) && is_null($user['email_verified_at'])) {
            $emailData = [];
            $emailData['email'] = $user['email'];
            $emailData['language'] = $language->title;
            $emailData['id'] = $user['id'];
            MailController::emailVerification($emailData);
            // $user->email_verified_at = date("Y-m-d H:i:s", strtotime('+4 hours'));
            // $user->save();

            return back()->with('success', 'Verification was resend, please check Email');
        } elseif(!isset($user)) {
            return redirect()->route('getLogin', $lang)->with('alert', 'This Email not exists in DataBase!');
        } else {
            return redirect()->route('getLogin', $lang)->with('alert', 'Email already registered or already confirmed');
        }
    }


    public static function logout(Request $request, $lang) {
        Auth::logout();

        return redirect()->route('getLogin', $lang);
    }


    public static function getRecover(Request $request, $lang) {
        $page = Page::firstWhere('slug', 'passRecover');
        $language = Language::firstWhere('title', $lang);
        $data = array_merge(self::getDefaultData($language, $page));

        return view('auth.recover.recover', $data);
    }


    public static function recover(Request $request, $lang) {
        App::setLocale($lang);

        $validated = $request->validate([
            'email' => 'required|max:255',
        ]);

        if(User::firstWhere('email', $request->input('email'))) {
            $page = Page::firstWhere('slug', 'passRecover');
            $language = Language::firstWhere('title', $lang);
            $email = $request->input('email');

            $user = User::firstWhere('email', $email);

            $emailData = [];
            $emailData['email'] = $email;
            $emailData['language'] = $language->title;
            $emailData['name'] = $user->name;

            MailController::passwordRecovery($emailData);

            return back()->with('alert', __('auth.email_was_sent'));
        }

        return back()->with('alert', __('auth.email_not_exists'));
    }


    public static function getReset(Request $request, $lang, $email) {
        $page = Page::firstWhere('slug', 'passRecover');
        $language = Language::firstWhere('title', $lang);
        $data = array_merge(self::getDefaultData($language, $page), 
                            [   
                                'email' => $email
                            ]);

        return view('auth.recover.password', $data);
    }


    public static function reset(Request $request, $lang, $email) {
        App::setLocale($lang);

        $validated = $request->validate([
            'password' => 'required|min:8',
            'confirmPassword' => 'required|min:8|same:password',
        ]);

        $language = Language::firstWhere('title', $lang);

        $user = User::firstWhere('email', $email);
        $user->password = $request->input('password');
        $user->save();

        return redirect()->route('getLogin', $language->title)->with('alert', 'Password was changed successfully!');
    }
}