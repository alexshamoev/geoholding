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

        NewsStep0 :: setLang($lang);
        NewsStep0 :: setPageAlias($page -> alias);

        $data = array_merge(PageController :: getDefaultData($language, $page),
                            ['newsStep0' => NewsStep0 :: where('published', 1) -> orderByDesc('rang') -> get()]);

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
        NewsStep1 :: setStep0Alias($activeNews -> alias);

        $data = array_merge(PageController :: getDefaultData($language, $page),
                            ['activeNewsStep0' => $activeNews,
                             'newsStep1' => NewsStep1 :: where('published', 1) -> where('parent', $activeNews -> id) -> orderByDesc('rang') -> get()]);

        return view('modules.news.step1', $data);
    }

    
    public static function getStep2($lang, $step0Alias, $step1Alias) {
        $language = Language :: where('title', $lang) -> first();
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();


        Page :: setLang($language -> title);
        
        NewsStep0 :: setLang($language -> title);
        NewsStep0 :: setPageAlias($page -> alias);

        $activeNewsStep0 = NewsStep0 :: where('alias_'.$language -> title, $step0Alias) -> first();

        NewsStep1 :: setLang($language -> title);
        NewsStep1 :: setPageAlias($page -> alias);
        NewsStep1 :: setStep0Alias($activeNewsStep0 -> alias);

        $activeNewsStep1 = NewsStep1 :: where('alias_'.$language -> title, $step1Alias) -> first();

        NewsStep2 :: setLang($language -> title);
        NewsStep2 :: setPageAlias($page -> alias);
        NewsStep2 :: setStep0Alias($activeNewsStep0 -> alias);
        NewsStep2 :: setStep1Alias($activeNewsStep1 -> alias);


        $data = array_merge(PageController :: getDefaultData($language, $page),
                            ['activeNewsStep0' => $activeNewsStep0,
                            'activeNewsStep1' => $activeNewsStep1,
                            'newsStep2' => NewsStep2 :: where('published', 1) -> where('parent', $activeNewsStep1 -> id) -> orderByDesc('rang') -> get()]);

        return view('modules.news.step2', $data);
    }

    
    public static function getStep3($lang, $step0Alias, $step1Alias, $step2Alias) {
        $language = Language :: where('title', $lang) -> first();
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();


        Page :: setLang($language -> title);
        
        NewsStep0 :: setLang($language -> title);
        NewsStep0 :: setPageAlias($page -> alias);

        $activeNewsStep0 = NewsStep0 :: where('alias_'.$language -> title, $step0Alias) -> first();

        NewsStep1 :: setLang($language -> title);
        NewsStep1 :: setPageAlias($page -> alias);
        NewsStep1 :: setStep0Alias($activeNewsStep0 -> alias);

        $activeNewsStep1 = NewsStep1 :: where('alias_'.$language -> title, $step1Alias) -> first();

        NewsStep2 :: setLang($language -> title);
        NewsStep2 :: setPageAlias($page -> alias);
        NewsStep2 :: setStep0Alias($activeNewsStep0 -> alias);
        NewsStep2 :: setStep1Alias($activeNewsStep1 -> alias);

        $activeNewsStep2 = NewsStep2 :: where('alias_'.$language -> title, $step2Alias) -> first();

        NewsStep3 :: setLang($language -> title);
        NewsStep3 :: setPageAlias($page -> alias);
        NewsStep3 :: setStep0Alias($activeNewsStep0 -> alias);
        NewsStep3 :: setStep1Alias($activeNewsStep1 -> alias);
        NewsStep3 :: setStep2Alias($activeNewsStep2 -> alias);


        $data = array_merge(PageController :: getDefaultData($language, $page),
                            ['activeNewsStep0' => $activeNewsStep0,
                            'activeNewsStep1' => $activeNewsStep1,
                            'activeNewsStep2' => $activeNewsStep2,
                            'newsStep3' => NewsStep3 :: where('published', 1) -> where('parent', $activeNewsStep2 -> id) -> orderByDesc('rang') -> get()]);

        return view('modules.news.step3', $data);
    }

    
    public static function getStep4($lang, $step0Alias, $step1Alias, $step2Alias, $step3Alias) {
        $language = Language :: where('title', $lang) -> first();
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();


        Page :: setLang($language -> title);
        
        NewsStep0 :: setLang($language -> title);
        NewsStep0 :: setPageAlias($page -> alias);

        $activeNewsStep0 = NewsStep0 :: where('alias_'.$language -> title, $step0Alias) -> first();

        NewsStep1 :: setLang($language -> title);
        NewsStep1 :: setPageAlias($page -> alias);
        NewsStep1 :: setStep0Alias($activeNewsStep0 -> alias);

        $activeNewsStep1 = NewsStep1 :: where('alias_'.$language -> title, $step1Alias) -> first();

        NewsStep2 :: setLang($language -> title);
        NewsStep2 :: setPageAlias($page -> alias);
        NewsStep2 :: setStep0Alias($activeNewsStep0 -> alias);
        NewsStep2 :: setStep1Alias($activeNewsStep1 -> alias);

        $activeNewsStep2 = NewsStep2 :: where('alias_'.$language -> title, $step2Alias) -> first();

        NewsStep3 :: setLang($language -> title);
        NewsStep3 :: setPageAlias($page -> alias);
        NewsStep3 :: setStep0Alias($activeNewsStep0 -> alias);
        NewsStep3 :: setStep1Alias($activeNewsStep1 -> alias);
        NewsStep3 :: setStep2Alias($activeNewsStep2 -> alias);

        $activeNewsStep3 = NewsStep3 :: where('alias_'.$language -> title, $step3Alias) -> first();


        $data = array_merge(PageController :: getDefaultData($language, $page),
                            ['activeNewsStep0' => $activeNewsStep0,
                            'activeNewsStep1' => $activeNewsStep1,
                            'activeNewsStep2' => $activeNewsStep2,
                            'activeNewsStep3' => $activeNewsStep3]);

        return view('modules.news.step4', $data);
    }
}