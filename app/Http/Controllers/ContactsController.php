<?php
namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Language;

class ContactsController extends FrontController {
    private const PAGE_SLUG = 'contact';

    
    public static function getStep0($lang) {
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();
        $language = Language :: where('title', $lang) -> first();
        
        return view('modules.contacts.step0', self :: getDefaultData($language, $page));
    }
}