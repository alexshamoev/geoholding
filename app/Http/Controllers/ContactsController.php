<?php
namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Language;

class ContactsController extends FrontController {
    private const PAGE_SLUG = 'contact';
    private static $page;


    public function __construct() {
        parent::__construct();
        
        self::$page = Page::firstWhere('slug', self::PAGE_SLUG);
    }
    
    
    public static function getStep0($lang) {
        $language = Language::where('title', $lang)->first();
        
        return view('modules.contacts.step0', self::getDefaultData($language, self::$page));
    }
}