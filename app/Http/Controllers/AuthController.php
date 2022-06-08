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

class AuthController extends FrontController
{
    private const PAGE_SLUG = 'login';


    public static function getLogin($lang) {
        $cabinetPage = Page::firstWhere('slug', 'cabinet');

        if(!Auth::check()) {
            $page = Page::firstWhere('slug', self::PAGE_SLUG);
            $language = Language::firstWhere('title', $lang);
            $data = array_merge(self::getDefaultData($language, $page));

            return view('auth.login', $data);
        }

        return redirect()->route($cabinetPage->{ 'alias_'.$lang }, $lang);
    }


    public static function login(Request $request, $lang) {
        App::setLocale($lang);

        $validated = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required|min:8',
        ]);

        $page = Page::firstWhere('slug', 'cabinet');
        $language = Language::firstWhere('title', $lang);
        $loginFields = $request->only(['email', 'password']);
        
        if(Auth::attempt($loginFields)) {
            if(Auth::user()->hasVerifiedEmail()) {
                return redirect()->intended(route($page->alias, [$language->title]));
            }

            Auth::logout();
            
            return back()->with('alert', __('auth.email_needs_verifying'));
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
            'name' => 'required',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:5',
            'address' => 'required|max:255',
            'password' => 'required|min:8',
            'confirmPassword' => 'required|min:8|same:password',
        ]);

        $user = User::create($request->all());

        $language = Language::firstWhere('title', $lang);

        $emailData = [];
        $emailData['email'] = $request->input('email');
        $emailData['language'] = $language->title;
        $emailData['name'] = $request->input('name');
        $emailData['id'] = $user->id;

        MailController::emailVerification($emailData);
        
        return redirect()->route('getLogin', [$language->title])->with('alert', __('auth.registerSuccessStatus'));
    }


    public static function emailVerification($lang, $id) {
        $user = User::firstWhere('id', $id);
        $user->email_verified_at = date("Y-m-d H:i:s", strtotime('+4 hours'));
        $user->save();

        return redirect()->route('getLogin', $lang)->with('alert', 'Email was verified successfully');
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