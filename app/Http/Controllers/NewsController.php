<?php
namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\MenuButton;
use App\Models\Language;
use App\Models\Module;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\NewsStep0;
use App\Models\NewsStep1;
use App\Models\NewsStep2;
use App\Models\NewsStep3;
use App\Models\Partner;
use App\Widget;
use Illuminate\Http\Request;


class NewsController extends Controller {
    private const PAGE_SLUG = 'news';


    public static function getStep0($lang) {
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();
        $language = Language :: where('title', $lang) -> first();

        Page :: setLang($language -> title);

        NewsStep0 :: setLang($language -> title);
        NewsStep0 :: setPageAlias($page -> alias);

        $data = array_merge(PageController :: getDefaultData($language,
                                                            $page),
                                                            [
                                                                'newsStep0' => NewsStep0 :: orderByDesc('rang') -> get()
                                                            ]);

        return view('modules.news.step0', $data);
    }


    public static function getStep1($lang, $step0Alias) {
        $language = Language :: where('title', $lang) -> first();
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();

        Page :: setLang($language -> title);
        
        NewsStep0 :: setLang($language -> title);
        NewsStep0 :: setPageAlias($page -> alias);

        $activeNews = NewsStep0 :: where('alias_'.$language -> title, $step0Alias) -> first();

        NewsStep1 :: setLang($language -> title);
        NewsStep1 :: setPageAlias($page -> alias);

        $data = array_merge(PageController :: getDefaultData($language,
                                                            $page,
                                                            $activeNews),
                                                            [
                                                                'activeNewsStep0' => $activeNews
                                                            ]
                            );

        return view('modules.news.step1', $data);
    }

    
    public static function getStep2($lang, $step0Alias, $step1Alias) {
        $language = Language :: where('title', $lang) -> first();
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();


        Page :: setLang($language -> title);
        
        NewsStep0 :: setLang($language -> title);
        NewsStep0 :: setPageAlias($page -> alias);

        NewsStep1 :: setLang($language -> title);
        NewsStep1 :: setPageAlias($page -> alias);

        $activeNewsStep1 = NewsStep1 :: where('alias_'.$language -> title, $step1Alias) -> first();

        NewsStep2 :: setLang($language -> title);
        NewsStep2 :: setPageAlias($page -> alias);

        $data = array_merge(PageController :: getDefaultData($language,
                                                            $page,
                                                            $activeNewsStep1 -> parentModel,
                                                            $activeNewsStep1),
                                                            [
                                                                'activeNewsStep1' => $activeNewsStep1
                                                            ]
                            );

        return view('modules.news.step2', $data);
    }

    
    public static function getStep3($lang, $step0Alias, $step1Alias, $step2Alias) {
        $language = Language :: where('title', $lang) -> first();
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();


        Page :: setLang($language -> title);
        
        NewsStep0 :: setLang($language -> title);
        NewsStep0 :: setPageAlias($page -> alias);

        NewsStep1 :: setLang($language -> title);
        NewsStep1 :: setPageAlias($page -> alias);

        NewsStep2 :: setLang($language -> title);
        NewsStep2 :: setPageAlias($page -> alias);

        $activeNewsStep2 = NewsStep2 :: where('alias_'.$language -> title, $step2Alias) -> first();

        NewsStep3 :: setLang($language -> title);
        NewsStep3 :: setPageAlias($page -> alias);


        $data = array_merge(PageController :: getDefaultData($language,
                                                                $page,
                                                                $activeNewsStep2 -> parentModel -> parentModel,
                                                                $activeNewsStep2 -> parentModel,
                                                                $activeNewsStep2),
                                                                [
                                                                    'activeNewsStep2' => $activeNewsStep2
                                                                ]
                            );

        return view('modules.news.step3', $data);
    }

    
    public static function getStep4($lang, $step0Alias, $step1Alias, $step2Alias, $step3Alias) {
        $language = Language :: where('title', $lang) -> first();
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();


        Page :: setLang($language -> title);
        
        NewsStep0 :: setLang($language -> title);
        NewsStep0 :: setPageAlias($page -> alias);

        NewsStep1 :: setLang($language -> title);
        NewsStep1 :: setPageAlias($page -> alias);

        NewsStep2 :: setLang($language -> title);
        NewsStep2 :: setPageAlias($page -> alias);

        NewsStep3 :: setLang($language -> title);
        NewsStep3 :: setPageAlias($page -> alias);

        $activeNewsStep3 = NewsStep3 :: where('alias_'.$language -> title, $step3Alias) -> first();


        $data = array_merge(PageController :: getDefaultData($language,
                                                                $page,
                                                                $activeNewsStep3 -> parentModel -> parentModel -> parentModel,
                                                                $activeNewsStep3 -> parentModel -> parentModel,
                                                                $activeNewsStep3 -> parentModel,
                                                                $activeNewsStep3),
                                                                [
                                                                    'activeNewsStep3' => $activeNewsStep3
                                                                ]
                            );

        return view('modules.news.step4', $data);
    }
}