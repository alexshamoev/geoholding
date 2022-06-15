<?php
namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Language;

class HomeController extends FrontController {
    private const PAGE_SLUG = 'home';

    
    public static function getStep0($lang) {
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();
        $language = Language :: where('title', $lang) -> first();

        $data = array_merge(self :: getDefaultData($language, $page));
        
        return view('modules.home.step0', $data);
    }
}