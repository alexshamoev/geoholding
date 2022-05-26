<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Language;
use App\Models\ProductStep0;
use App\Models\ProductStep1;

class ProductsController extends FrontController
{
    private const PAGE_SLUG = 'products';


    public static function getStep0($lang) {
        $page = Page::where('slug', self::PAGE_SLUG)->first();
        $language = Language::where('title', $lang)->first();

        $data = array_merge(self::getDefaultData($language,
                                                    $page),
                                                    [
                                                        'productStep0' => ProductStep0::orderByDesc('rang')->get()
                                                    ]);

        return view('modules.products.step0', $data);
    }


    public static function getStep1($lang, $step0Alias) {
        $language = Language::firstWhere('title', $lang);
        $page = Page::firstWhere('slug', self::PAGE_SLUG);

        $activeProducts = ProductStep0::firstWhere('alias_'.$language->title, $step0Alias);

        $data = array_merge(self::getDefaultData($language,
                                                    $page,
                                                    $activeProducts),
                                                    [
                                                        'activeProductsStep0' => $activeProducts
                                                    ]
                            );

        return view('modules.products.step1', $data);
    }

    
    public static function getStep2($lang, $step0Alias, $step1Alias) {
        $language = Language::where('title', $lang)->first();
        $page = Page::where('slug', self::PAGE_SLUG)->first();

        $activeProductStep1 = ProductStep1::where('alias_'.$language->title, $step1Alias)->first();

        $data = array_merge(self::getDefaultData($language,
                                                    $page,
                                                    $activeProductStep1),
                                                    [
                                                        'activeProductStep1' => $activeProductStep1
                                                    ]
                            );

        return view('modules.products.step2', $data);
    }

    
    // public static function getStep3($lang, $step0Alias, $step1Alias, $step2Alias) {
    //     $language = Language::where('title', $lang)->first();
    //     $page = Page::where('slug', self::PAGE_SLUG)->first();

    //     $activeNewsStep2 = NewsStep2::where('alias_'.$language->title, $step2Alias)->first();


    //     $data = array_merge(self::getDefaultData($language,
    //                                                 $page,
    //                                                 $activeNewsStep2),
    //                                                 [
    //                                                     'activeNewsStep2' => $activeNewsStep2
    //                                                 ]
    //                         );

    //     return view('modules.news.step3', $data);
    // }

    
    // public static function getStep4($lang, $step0Alias, $step1Alias, $step2Alias, $step3Alias) {
    //     $language = Language::where('title', $lang)->first();
    //     $page = Page::where('slug', self::PAGE_SLUG)->first();

    //     $activeNewsStep3 = NewsStep3::where('alias_'.$language->title, $step3Alias)->first();

    //     $data = array_merge(self::getDefaultData($language,
    //                                                 $page,
    //                                                 $activeNewsStep3),
    //                                                 [
    //                                                     'activeNewsStep3' => $activeNewsStep3
    //                                                 ]
    //                         );

    //     return view('modules.news.step4', $data);
    // }
}
