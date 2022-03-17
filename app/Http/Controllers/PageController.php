<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\MenuButtonStep0;
use App\Models\MenuButtonStep1;
use App\Models\Language;
use App\Models\Module;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\Partner;
use App\Widget;

use Illuminate\Http\Request;
use App;


class PageController extends Controller {
	public static function getDefaultData($lang, $page, $activeInfoBlockModel = false) {
		App :: setLocale($lang -> title);

		// dd(parse_url(url() -> current()));

		if($activeInfoBlockModel) {
			Language :: setActiveInfoBlock($activeInfoBlockModel);
		} else {
			Language :: setActiveInfoBlock($page);
		}
		

		MenuButtonStep0 :: setPage($page -> alias);

		MenuButtonStep1 :: setPage($page -> alias);

		$widgetGetVisibility = Widget :: getVisibility($page);

		$bsc = Bsc :: getFullData();
		$copyrightDate = config('constants.year_of_site_creation');

		if($copyrightDate < date('Y')) {
			$copyrightDate .= ' - '.date('Y');
		}

		$data = ['page' => $page,
				'language' => $lang,
				'languages' => Language :: where('disable', '0') -> orderByDesc('rang') -> get(),
				'menuButtons' => MenuButtonStep0 :: orderByDesc('rang') -> with([
					'page'
				]) -> get(),
				'bsc' => $bsc,
				'bsw' => Bsw :: getFullData(),
				'registrationUrl' => '/'.$lang -> title.'/'.Page :: where('slug', 'registration') -> first() -> alias,
				'authorizationUrl' => '/'.$lang -> title.'/'.Page :: where('slug', 'authorization') -> first() -> alias,
				'partners' => Partner :: orderByDesc('rang') -> get(),
				'widgetGetVisibility' => $widgetGetVisibility,
				'copyrightDate' => $copyrightDate];
		
		return $data;
	}



	public static function test() {
		$page = Page :: where('slug', 'registration') -> first();
        $language = Language :: where('title', 'ge') -> first();

		return view('auth.m-register', PageController :: getDefaultData($language, $page));
	}




	
	public function getDefaultPageWithDefaultLanguage() {
		$language = Language :: where('like_default', 1) -> first();

		$NewsController = new NewsController;

		return $NewsController -> getStep0($language -> title);
	}

	
	public function getDefaultPage($lang) {
		$NewsController = new NewsController;
		
		return $NewsController -> getStep0($lang);
	}


	public static function getPage($lang, $pageAlias) {
		$language = Language :: where('title', $lang) -> first();

		if($language) {
			$page = Page :: where('alias_'.$language -> title, $pageAlias) -> first();

			if($page) {
				return view('static', self :: getDefaultData($language, $page, $page));
			} else {
				abort(404);
			}
		} else {
			abort(404);
		}
	}
}