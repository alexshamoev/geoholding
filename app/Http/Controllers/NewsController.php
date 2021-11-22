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
    private const PAGE_SLUG = 'news';


    public static function getStep0($lang) {
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();
        $language = Language :: where('title', $lang) -> first();

        News :: setLang($lang);

        Page :: setLang($language -> title);
        
        News :: setPageAlias($page -> alias);

        $data = array_merge(PageController :: getDefaultData($language, $page),
                            ['newsStep0' => News :: where('published', 1) -> orderByDesc('rang') -> get()]);

        return view('modules.news.step0', $data);
    }


    public static function getStep1($lang, $stepAlias) {
        $language = Language :: where('title', $lang) -> first();
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();

        
        News :: setLang($language -> title);

        Page :: setLang($language -> title);

        News :: setPageAlias($page -> alias);

        $parent = News :: where('alias_'.$language -> title, $stepAlias) -> first();

        NewsStep1 :: setLang($language -> title);
        NewsStep1 :: setPageAlias($page -> alias);
        NewsStep1 :: setStep0Alias($parent -> alias);

        $data = array_merge(PageController :: getDefaultData($language, $page),
                            ['newsStep0' => News :: where('published', 1) -> orderByDesc('rang') -> get(),
                             'activeNews' => $parent,
                             'newsStep1' => NewsStep1 :: where('published', 1) -> where('parent', $parent -> id) -> orderByDesc('rang') -> get()]);

        return view('modules.news.step1', $data);
    }
}