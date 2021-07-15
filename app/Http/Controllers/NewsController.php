<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\MenuButton;
use App\Models\Language;
use App\Models\Module;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\News;
use App\Models\Partner;
use App\Widget;
use Illuminate\Http\Request;


class NewsController extends Controller {
    public static function getStep0($language, $page) {
        $data = PageController :: getDefaultData($language, $page);

		$data = array_merge($data, ['newsStep0' => News :: getFullData($language -> title)]);

        return view('modules.news.step0', $data);
    }


    public static function getStep1($language, $pageAlias, $stepAlias, $page) {
        $activeNews = News :: where('alias_'.$language -> title, $stepAlias) -> first();

        $data = PageController :: getDefaultData($language, $page);

        $data = array_merge($data, ['newsStep0' => News :: getFullData($language -> title),
                                    'activeNews' => $activeNews -> getData($language -> title)]);

        return view('modules.news.step1', $data);
    }
}