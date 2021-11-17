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
        $data = array_merge(PageController :: getDefaultData($language, $page),
                            ['newsStep0' => News :: where('published', 1) -> orderByDesc('rang') -> get()]);

        return view('modules.news.step0', $data);
    }


    public static function getStep1($language, $page, $stepAlias) {
        $data = array_merge(PageController :: getDefaultData($language, $page),
                            ['newsStep0' => News :: where('published', 1) -> orderByDesc('rang') -> get(),
                             'activeNews' => News :: where('alias_'.$language -> title, $stepAlias) -> first()]);

        return view('modules.news.step1', $data);
    }
}