<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Language;

class CabinetController extends FrontController
{
    private const PAGE_SLUG = 'cabinet';


    public static function getStep0($lang) {
        $page = Page::firstWhere('slug', self::PAGE_SLUG);
        $language = Language::firstWhere('title', $lang);

        $data = array_merge(self::getDefaultData($language,
                                                    $page),
                            [
                            ]);

        return view('modules.cabinet.step0', $data);
    }
}
