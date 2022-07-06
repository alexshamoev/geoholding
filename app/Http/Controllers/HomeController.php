<?php
namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Language;

class HomeController extends FrontController {
    private const PAGE_SLUG = 'home';
    private static $page;


    public function __construct() {
        self::$page = Page::firstWhere('slug', self::PAGE_SLUG);
    }
    
    
    public static function getStep0($lang) {
        $language = Language::where('title', $lang)->first();

        $data = array_merge(self::getDefaultData($language, self::$page));
        
        return view('modules.home.step0', $data);
    }
}