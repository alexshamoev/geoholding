<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Language;
use App\Models\ProductStep0;
use App\Models\ProductStep1;
use App\Models\ProductStep2;

class ProductsController extends FrontController {
    private const PAGE_SLUG = 'products';
    private static $page;


    public function __construct() {
        parent::__construct();
        
        self::$page = Page::firstWhere('slug', self::PAGE_SLUG);
        
        ProductStep0::setPage(self::$page);
    }


    public static function getStep0($lang) {
        $language = Language::where('title', $lang)->first();

        $data = array_merge(self::getDefaultData($language,
                                                    self::$page),
                                                    [
                                                        'productStep0' => ProductStep0::orderByDesc('rang')->get()
                                                    ]);

        return view('modules.products.step0', $data);
    }


    public static function getStep1($lang, $step0Alias) {
        $language = Language::firstWhere('title', $lang);

        $activeProducts = ProductStep0::firstWhere('alias_'.$language->title, $step0Alias);

        $data = array_merge(self::getDefaultData($language,
                                                    self::$page,
                                                    $activeProducts),
                                                    [
                                                        'activeProductsStep0' => $activeProducts
                                                    ]
                            );

        return view('modules.products.step1', $data);
    }

    
    public static function getStep2($lang, $step0Alias, $step1Alias) {
        $language = Language::firstWhere('title', $lang);

        $activeProductStep1 = ProductStep1::firstWhere('alias_'.$language->title, $step1Alias);

        $data = array_merge(self::getDefaultData($language,
                                                    self::$page,
                                                    $activeProductStep1),
                                                    [
                                                        'activeProductStep1' => $activeProductStep1
                                                    ]
                            );

        return view('modules.products.step2', $data);
    }

    
    public static function getStep3($lang, $step0Alias, $step1Alias, $step2Alias) {
        $language = Language::firstWhere('title', $lang);

        $activeProductStep2 = ProductStep2::firstWhere('alias_'.$language->title, $step2Alias);


        $data = array_merge(self::getDefaultData($language,
                                                    self::$page,
                                                    $activeProductStep2),
                                                    [
                                                        'activeProductStep2' => $activeProductStep2
                                                    ]
                            );

        return view('modules.products.step3', $data);
    }
}
