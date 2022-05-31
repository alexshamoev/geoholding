<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Language;
use Auth;

class LoginController extends FrontController
{
    private const PAGE_SLUG = 'login';


    public static function getStep0($lang) {
        $page = Page::firstWhere('slug', self::PAGE_SLUG);
        $language = Language::firstWhere('title', $lang);

        $data = array_merge(self::getDefaultData($language,
                                                    $page),
                            [
                            ]);

        return view('modules.login.step0', $data);
    }


    public static function login(Request $request, $lang) {
        $page = Page::firstWhere('slug', 'cabinet');
        $language = Language::firstWhere('title', $lang);

        if(Auth::check()) {
            return redirect()->intended(route($page->alias, [$language->title]));
            // dd('loged in 333');
        }

        $loginFields = $request->only(['email', 'password']);

        if(Auth::attempt($loginFields)) {
            // return redirect()->intended(route('adminDefaultPage'));
        }

        // $page = Page::firstWhere('slug', self::PAGE_SLUG);
        // $language = Language::firstWhere('title', $lang);

        // $data = array_merge(self::getDefaultData($language,
        //                                             $page),
        //                     [
        //                     ]);

        // return view('modules.login.step0', $data);
    }
}
