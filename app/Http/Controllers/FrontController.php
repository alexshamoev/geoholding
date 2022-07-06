<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\MenuButtonStep0;
use App\Models\Language;
use App\Models\Module;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\Partner;
use App\Widget;

use Illuminate\Http\Request;


class FrontController extends Controller {
	public function __construct() {
		$requesPath = urldecode(\Request::path());

		$activePageArray = explode('/', $requesPath);

		$activePage = $activePageArray[1];

		config(['activePageAlias' => $activePage]);
    }
	

    public static function getDefaultData($lang, $page, $activeInfoBlockModel = false) {
		\App::setLocale($lang->title);


		if($activeInfoBlockModel) {
			Language::setActiveInfoBlock($activeInfoBlockModel);
		} else {
			Language::setActiveInfoBlock($page);
		}
		

		$widgetGetVisibility = Widget::getVisibility($page);

		$bsc = Bsc::getFullData();
		$copyrightDate = config('constants.year_of_site_creation');

		if($copyrightDate < date('Y')) {
			$copyrightDate .= ' - '.date('Y');
		}

		$data = ['page' => $page,
				'language' => $lang,
				'languages' => Language::where('disable', '0')->orderByDesc('rang')->get(),
				'menuButtons' => MenuButtonStep0::with(['page', 'menuButtonStep1', 'menuButtonStep1.page'])->orderByDesc('rang')->get(),
				'bsc' => $bsc,
				'bsw' => Bsw::getFullData(),
				'registrationPageUrl' => '/'.$lang->title.'/'.Page::firstWhere('slug', 'registration')->alias,
				'loginPageUrl' => '/'.$lang->title.'/'.Page::firstWhere('slug', 'login')->alias,
				'basketPage' => Page::firstWhere('slug', 'basket'),
				'partners' => Partner::orderByDesc('rang')->get(),
				'widgetGetVisibility' => $widgetGetVisibility,
				'copyrightDate' => $copyrightDate];
		
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