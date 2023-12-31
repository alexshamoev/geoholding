<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Language;
use App\Models\User;
use Auth;

class CabinetController extends FrontController {
    private const PAGE_SLUG = 'cabinet';
    private static $page;


    public function __construct() {
        parent::__construct();
        
        self::$page = Page::firstWhere('slug', self::PAGE_SLUG);
    }


    public static function getStep0($lang) {
        if(Auth::check()) {
            $language = Language::firstWhere('title', $lang);
    
            $data = array_merge(self::getDefaultData($language,
                                                        self::$page),
                                [
                                    'user' => Auth::user(),
                                ]);
    
            return view('modules.cabinet.step0', $data);
        }

        return redirect()->route('getLogin', $lang);
    }


    public static function edit($lang) {
        $language = Language::firstWhere('title', $lang);

        $data = array_merge(self::getDefaultData($language,
                                                    self::$page),
                            [
                                'user' => Auth::user(),
                            ]);

        return view('modules.cabinet.edit', $data);
    }


    public static function update(Request $request, $lang) {
        $validated = $request->validate([
            'name' => 'required',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:15|min:3',
            'address' => 'required|max:255',
        ]);

        $user = User::firstWhere('email', Auth::user()->email);
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->save();

        $language = Language::firstWhere('title', $lang);

        $data = array_merge(self::getDefaultData($language,
                                                    self::$page),
                            [
                                'user' => Auth::user(),
                            ]);

        return redirect()->route(self::$page->alias, $language->title);
    }
}
