<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\User;
use App\Models\Language;
use Auth;
use Session;

class AuthController extends FrontController
{
    private const PAGE_SLUG = 'login';


    public static function getLogin($lang) {
        $page = Page::firstWhere('slug', self::PAGE_SLUG);
        $language = Language::firstWhere('title', $lang);
        $data = array_merge(self::getDefaultData($language, $page));

        return view('auth.login', $data);
    }


    public static function getRegistration($lang) {
        $page = Page::firstWhere('slug', self::PAGE_SLUG);
        $language = Language::firstWhere('title', $lang);
        $data = array_merge(self::getDefaultData($language, $page));

        return view('auth.register', $data);
    }


    public static function registration(Request $request, $lang) {
        $validated = $request->validate([
            'name' => 'required',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:15|min:3',
            'address' => 'required|max:255',
            'password' => 'required|min:8',
            'confirmPassword' => 'required|min:8|same:password',
        ]);

        User::create($request->all());

        $language = Language::firstWhere('title', $lang);

		Session::flash('successDeleteStatus', __('auth.registerSuccessStatus'));
        
        return redirect()->route('getLogin', [$language->title]);
    }


    public static function login(Request $request, $lang) {
        $page = Page::firstWhere('slug', 'cabinet');
        $language = Language::firstWhere('title', $lang);

        if(Auth::check()) {
            return redirect()->intended(route($page->alias, [$language->title]));
        }

        $loginFields = $request->only(['email', 'password']);

        if(Auth::attempt($loginFields)) {
            return redirect()->intended(route($page->alias, [$language->title]));
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

        return view('auth.recover.password', $data);
    }


    public static function recover(Request $request, $lang) {
        $page = Page::firstWhere('slug', 'passRecover');
        $language = Language::firstWhere('title', $lang);
        $data = array_merge(self::getDefaultData($language, $page));

        return view('auth.password_recover', $data);
    }
}
