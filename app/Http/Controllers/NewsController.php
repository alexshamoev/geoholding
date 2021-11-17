<?php
namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\MenuButton;
use App\Models\Language;
use App\Models\Module;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\News;
use App\Models\NewsStep1;
use App\Models\Partner;
use App\Widget;
use Illuminate\Http\Request;


class NewsController extends Controller {
    public static function getStep0($language, $page) {
        $data = array_merge(PageController :: getDefaultData($language, $page),
                            ['newsStep0' => News :: where('published', 1) -> orderByDesc('rang') -> get()]);

        return view('modules.news.step0', $data);
    }


    public static function getStep1($language, $page, $stepAlias) {
        $parent = News :: where('alias_'.$language -> title, $stepAlias) -> first();

        $data = array_merge(PageController :: getDefaultData($language, $page),
                            ['newsStep0' => News :: where('published', 1) -> orderByDesc('rang') -> get(),
                             'activeNews' => $parent,
                             'newsStep1' => NewsStep1 :: where('published', 1) -> where('parent', $parent -> id) -> orderByDesc('rang') -> get()]);

        return view('modules.news.step1', $data);
    }
}