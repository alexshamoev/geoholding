<?php
namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Language;
use App\Models\NewsStep0;
use App\Models\NewsStep1;
use App\Models\NewsStep2;
use App\Models\NewsStep3;


class NewsController extends FrontController {
    private const PAGE_SLUG = 'news';
    private static $page;

    function __construct() {
        self::$page = Page::firstWhere('slug', self::PAGE_SLUG);

        NewsStep0::setPage(self::$page);
    }

    public static function getStep0($lang) {
        $language = Language::firstWhere('title', $lang);

        $data = array_merge(self::getDefaultData($language,
                                                    self::$page),
                            [
                                'newsStep0' => NewsStep0::orderByDesc('rang')->get()
                            ]);

        return view('modules.news.step0', $data);
    }


    public static function getStep1($lang, $step0Alias) {
        $language = Language::firstWhere('title', $lang);
        $activeNews = NewsStep0::firstWhere('alias_'.$language->title, $step0Alias);

        $data = array_merge(self::getDefaultData($language,
                                                    self::$page,
                                                    $activeNews),
                                                    [
                                                        'activeNewsStep0' => $activeNews
                                                    ]
                            );

        return view('modules.news.step1', $data);
    }

    
    public static function getStep2($lang, $step0Alias, $step1Alias) {
        $language = Language::firstWhere('title', $lang);
        $activeNewsStep1 = NewsStep1::firstWhere('alias_'.$language->title, $step1Alias);

        $data = array_merge(self::getDefaultData($language,
                                                    self::$page,
                                                    $activeNewsStep1),
                                                    [
                                                        'activeNewsStep1' => $activeNewsStep1
                                                    ]
                            );

        return view('modules.news.step2', $data);
    }

    
    public static function getStep3($lang, $step0Alias, $step1Alias, $step2Alias) {
        $language = Language::firstWhere('title', $lang);
        $activeNewsStep2 = NewsStep2::firstWhere('alias_'.$language->title, $step2Alias);


        $data = array_merge(self::getDefaultData($language,
                                                    self::$page,
                                                    $activeNewsStep2),
                                                    [
                                                        'activeNewsStep2' => $activeNewsStep2
                                                    ]
                            );

        return view('modules.news.step3', $data);
    }

    
    public static function getStep4($lang, $step0Alias, $step1Alias, $step2Alias, $step3Alias) {
        $language = Language::firstWhere('title', $lang);
        $activeNewsStep3 = NewsStep3::firstWhere('alias_'.$language->title, $step3Alias);

        $data = array_merge(self::getDefaultData($language,
                                                    self::$page,
                                                    $activeNewsStep3),
                                                    [
                                                        'activeNewsStep3' => $activeNewsStep3
                                                    ]
                            );

        return view('modules.news.step4', $data);
    }
}