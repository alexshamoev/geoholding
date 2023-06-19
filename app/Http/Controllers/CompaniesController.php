<?php

namespace App\Http\Controllers;

use App;
use App\Models\Page;
use App\Models\Language;
use App\Models\AboutUsStep0;
// use Illuminate\Http\Request;
use App\Models\CompaniesStep0;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\FrontController;

class CompaniesController extends FrontController
{
    private const PAGE_SLUG = 'company';
    
    private static $page;

    function __construct() 
    {
        //get active company by url
        // dd(Route::getCurrentRoute()->step0Alias);
        parent::__construct();
        
        self::$page = Page::firstWhere('slug', self::PAGE_SLUG);

        CompaniesStep0::setPage(self::$page);
        AboutUsStep0::setPage(Page::firstWhere('slug', 'about-us'));
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
        $language = Language::firstWhere('title', $lang);
        $activeCompany = CompaniesStep0::firstWhere('alias_'.$language->title, $step0Alias);
        
        //temporary save active company
        config(['activeCompany' => $activeCompany]);

        $data = array_merge(self::getDefaultData($language,
                                                    self::$page,
                                                    $activeCompany),
                                                    [
                                                        'activeCompany' => $activeCompany
                                                    ]);

        return view('modules.companies.step0', $data);
    }


    public static function getStep2($lang, $step0Alias, $step1Alias) 
    {
        $bladeFile = null;

        $language = Language::firstWhere('title', $lang);
        $activeCompany = CompaniesStep0::firstWhere('alias_'.$language->title, $step0Alias);
        
        config(['activeCompany' => $activeCompany]);
        
        $activeAbout = AboutUsStep0::firstWhere('top_level', $activeCompany->id);

        switch ($step1Alias) {
            case 'about-us':
            case 'ჩვენს-შესახებ':
                $data = array('activeAbout' => $activeAbout);
                $bladeFile = 'about-us';
                break;
            
            default:
                $data = array('activeCompany' => $activeCompany);
                $bladeFile = 'step0';
                break;
        }
        
        $data = array_merge(self::getDefaultData($language, 
                                                self::$page,
                                                $activeAbout),
                                            $data);

        return view("modules.companies.$bladeFile", $data);
    }
}
