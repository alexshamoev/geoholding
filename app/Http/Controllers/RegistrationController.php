<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Language;
use App\Models\User;
use Session;

class RegistrationController extends FrontController
{
    private const PAGE_SLUG = 'registration';


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

        $page = Page::firstWhere('slug', self::PAGE_SLUG);
        $language = Language::firstWhere('title', $lang);

		Session::flash('successDeleteStatus', __('auth.registerSuccessStatus'));
        
        return redirect()->route($page->alias, [$language->title]);
    }


    public static function getStep0($lang) {
        $page = Page::firstWhere('slug', self::PAGE_SLUG);
        $language = Language::firstWhere('title', $lang);

        $data = array_merge(self::getDefaultData($language,
                                                    $page),
                            [
                            ]);

        return view('modules.registration.step0', $data);
    }
}
