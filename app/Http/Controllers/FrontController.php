<?php

namespace App\Http\Controllers;

use App\Widget;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\Page;
use App\Models\Module;
use App\Models\Partner;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\CompaniesStep0;

use App\Models\MenuButtonStep0;
use App;


class FrontController extends Controller {

    private const PAGE_SLUG = 'company';
    
    private static $page;

	public function __construct() {
		$requesPath = urldecode(\Request::path());

		$activePageArray = explode('/', $requesPath);

		$activePage = $activePageArray[1];

		config(['activePageAlias' => $activePage]);

		Bsc::initConfigs();
		Bsw::initConfigs();
    }

	public static function main() 
    {
        $language = Language::firstWhere('title', App::getLocale());
		CompaniesStep0::setPage(Page::firstWhere('slug', self::PAGE_SLUG));

        $data = ['companies' => CompaniesStep0::orderByDesc('rang')->get()];

        return view('modules.main.all', $data);
    }
	

    public static function getDefaultData($lang, $page, $activeInfoBlockModel = false) {
		\App::setLocale($lang->title);


		if($activeInfoBlockModel) {
			Language::setActiveInfoBlock($activeInfoBlockModel);
		} else {
			Language::setActiveInfoBlock($page);
		}
		

		$widgetGetVisibility = Widget::getVisibility($page);

		if(config('constants.year_of_site_creation') < date('Y')) {
			config(['constants.year_of_site_creation' => config('constants.year_of_site_creation').' - '.date('Y')]);
		}

		$activeCompanyId = config('activeCompany')->id;
		
		$data = ['page' => $page,
				'language' => $lang,
				'languages' => Language::where('disable', '0')->orderByDesc('rang')->get(),
				'menuButtons' => MenuButtonStep0::where('top_level', $activeCompanyId)->with(['page', 'menuButtonStep1', 'menuButtonStep1.page'])->orderByDesc('rang')->get(),
				// 'registrationPageUrl' => '/'.$lang->title.'/'.Page::firstWhere('slug', 'registration')->alias,
				// 'loginPageUrl' => '/'.$lang->title.'/'.Page::firstWhere('slug', 'login')->alias,
				// 'basketPage' => Page::firstWhere('slug', 'basket'),
				// 'partners' => Partner::orderByDesc('rang')->get(),
				'widgetGetVisibility' => $widgetGetVisibility];
		
		return $data;
	}


    public static function getPage($lang, $pageAlias) {
		$language = Language::firstWhere('title', $lang);

		if($language) {
			$page = Page::firstWhere('alias_'.$language->title, $pageAlias);

			if($page) {
				return view('static', self::getDefaultData($language, $page, $page));
			} else {
				abort(404);
			}
		} else {
			abort(404);
		}
	}
}