<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Language;

class BasketController extends FrontController
{
    private const PAGE_SLUG = 'basket';


    public static function getStep0($lang) {
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();
        $language = Language :: where('title', $lang) -> first();

        $data = array_merge(self :: getDefaultData($language,
                                                    $page),
                            [
                            ]);

        return view('modules.basket.step0', $data);
    }
}
