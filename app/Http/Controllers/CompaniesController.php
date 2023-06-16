<?php

namespace App\Http\Controllers;

use App;
use App\Models\Page;
use App\Models\Language;
use App\Models\CompaniesStep0;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontController;

class CompaniesController extends FrontController
{
    private const PAGE_SLUG = 'company';
    
    private static $page;

    function __construct() 
    {
        parent::__construct();
        
        self::$page = Page::firstWhere('slug', self::PAGE_SLUG);

        CompaniesStep0::setPage(self::$page);
    }

    // public static function getStep0() 
    // {
    //     $language = Language::firstWhere('title', App::getLocale());

    //     $data = array_merge(self::getDefaultData($language,
    //                                                 self::$page),
    //                         [
    //                             'companies' => CompaniesStep0::orderByDesc('rang')->get(),
    //                         ]);

    //     return view('modules.companies.step0', $data);
    // }

    public static function getStep1($lang, $step0Alias)
    {
        session(['company_alias' => $step0Alias]);

        $language = Language::firstWhere('title', $lang);
        $activeCompany = CompaniesStep0::firstWhere('alias_'.$language->title, $step0Alias);
        
        $data = array_merge(self::getDefaultData($language,
                                                    self::$page,
                                                    $activeCompany),
                                                    [
                                                        'activeCompany' => $activeCompany
                                                    ]);

        return view('modules.companies.step0', $data);

    }
}
