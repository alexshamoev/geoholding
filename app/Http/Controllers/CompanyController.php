<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Language;
use App\Models\CompanyStep0;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontController;

class CompanyController extends FrontController
{
    private const PAGE_SLUG = 'company';
    
    private static $page;

    function __construct() {
        parent::__construct();
        
        self::$page = Page::firstWhere('slug', self::PAGE_SLUG);

        CompanyStep0::setPage(self::$page);
    }
#
    public static function getStep0($lang = 'ge') {
        $language = Language::firstWhere('title', $lang);

        $data = array_merge(self::getDefaultData($language,
                                                    self::$page),
                            [
                                'company' => CompanyStep0::orderByDesc('rang')->get()
                            ]);

        return view('modules.home.step0', $data);
    }
}
