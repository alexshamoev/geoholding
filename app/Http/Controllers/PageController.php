<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\MenuButton;
use App\Models\Language;
use App\Models\Module;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\News;
use App\Models\Partner;
use App\Widget;
use Illuminate\Http\Request;


class PageController extends Controller {
	private static function getDefaultData($lang, $page) {
		$widgetGetVisibility = Widget :: getVisibility($page);

		$bsc = Bsc :: getFullData();
		$copyrightDate = $bsc -> year_of_site_creation;

		if($bsc -> year_of_site_creation < date('Y')) {
			$copyrightDate .= ' - '.date('Y');
		}

		$data = ['page' => $page -> getFullData($lang -> title),
				'menuButtons' => MenuButton :: getFullData($lang -> title),
				'languages' => Language :: getFullData($lang -> title, $page),
				'bsc' => Bsc :: getFullData(),
				'bsw' => Bsw :: getFullData($lang -> title),
				'registrationUrl' => '/'.$lang -> title.'/'.Page :: where('slug', 'registration') -> first() -> getFullData($lang -> title) -> alias,
				'authorizationUrl' => '/'.$lang -> title.'/'.Page :: where('slug', 'authorization') -> first() -> getFullData($lang -> title) -> alias,
				'partners' => Partner :: getFullData($lang -> title),
				'widgetGetVisibility' => $widgetGetVisibility,
				'copyrightDate' => $copyrightDate];

		return $data;
	}

	
	public function getDefaultPageWithDefaultLanguage() {
		$page = Page :: where('like_default', 1) -> first();
		$language = Language :: where('like_default', 1) -> first();

		if($language && $page) {
			$page_template = 'static';
			
			$active_module = Module :: where('page', $page -> id) -> first();
			
			if($active_module) {
				$page_template = 'modules.'.$active_module -> alias.'.step0';
			}

			return view($page_template, self :: getDefaultData($language, $page));
		} else {
			abort(404);
		}
	}


	public function getDefaultPage($lang) {
		$language = Language :: where('title', $lang) -> first();

		if($language) {
			$page = Page :: where('like_default', 1) -> first();

			if($page) {
				$page_template = 'static';

				$active_module = Module :: where('page', $page -> id) -> first();
			
				if($active_module) {
					$page_template = 'modules.'.$active_module -> alias.'.step0';
				}
				
				return view($page_template, self :: getDefaultData($language, $page));
			} else {
				abort(404);
			}
		} else {
			abort(404);
		}
	}


	public function getPage($lang, $alias) {
		$language = Language :: where('title', $lang) -> first();

		if($language) {
			$page = Page :: where('alias_'.$lang, $alias) -> first();

			if($page) {
				$active_module = Module :: where('page', $page -> id) -> first();

			
				if($active_module) {
					switch($active_module -> alias) {
						case 'news':
							$data = self :: getDefaultData($language, $page);

							$data = array_merge($data, ['newsStep0' => News :: getFullData($lang)]);

							return view('modules.news.step0', $data);
							
							break;
					}
				}

				return view('static', self :: getDefaultData($language, $page));
			} else {
				abort(404);
			}
		} else {
			abort(404);
		}
	}


	public function getStep0($lang, $pageAlias, $stepAlias) {
		$language = Language :: where('title', $lang) -> first();

		if($language) {
			$page = Page :: where('alias_'.$lang, $pageAlias) -> first();

			if($page) {
				$active_module = Module :: where('page', $page -> id) -> first();
			
				if($active_module) {
					switch($active_module -> alias) {
						case 'news':
							$activeNews = News :: where('alias_'.$lang, $stepAlias) -> first();

							$data = self :: getDefaultData($language, $page);

							$data = array_merge($data, ['newsStep0' => News :: getFullData($lang),
														'activeNews' => $activeNews -> getData($lang)]);

							return view('modules.news.step1', $data);
							
							break;
					}
				}

				return view('static', self :: getDefaultData($language, $page));
			} else {
				abort(404);
			}
		} else {
			abort(404);
		}
	}


	// public function getStep1($lang, $pageAlias, $step0Alias, $step1Alias) {
	// 	$language = Language :: where('title', $lang) -> first();

	// 	if($language) {
	// 		$page = Page :: where('alias_'.$lang, $pageAlias) -> first();

	// 		if($page) {
	// 			$active_module = Module :: where('page', $page -> id) -> first();
			
	// 			if($active_module) {
	// 				switch($active_module -> alias) {
	// 					case 'news':
	// 						$activeNews = News :: where('alias_'.$lang, $stepAlias) -> first();

	// 						return view('modules.news.step1', ['page' => $page -> getFullData($lang),
	// 									'menuButtons' => MenuButton :: getFullData($lang),
	// 									'languages' => Language :: getFullData($lang, $page),
	// 									'bsc' => Bsc :: getFullData(),
	// 									'bsw' => Bsw :: getFullData($language -> title),
	// 									'registrationUrl' => '/'.$lang.'/'.Page :: where('slug', 'registration') -> first() -> getFullData($lang) -> alias,
	// 									'authorizationUrl' => '/'.$lang.'/'.Page :: where('slug', 'authorization') -> first() -> getFullData($lang) -> alias,
	// 									'newsStep0' => News :: getFullData($lang),
	// 									'activeNews' => $activeNews -> getData($lang)]);
							
	// 						break;
	// 				}
	// 			}

	// 			return view('static', ['page' => $page -> getFullData($lang),
	// 									'menuButtons' => MenuButton :: getFullData($lang),
	// 									'languages' => Language :: getFullData($lang, $page),
	// 									'bsc' => Bsc :: getFullData(),
	// 									'bsw' => Bsw :: getFullData($language -> title),
	// 									'registrationUrl' => '/'.$lang.'/'.Page :: where('slug', 'registration') -> first() -> getFullData($lang) -> alias,
	// 									'authorizationUrl' => '/'.$lang.'/'.Page :: where('slug', 'authorization') -> first() -> getFullData($lang) -> alias]);
	// 		} else {
	// 			abort(404);
	// 		}
	// 	} else {
	// 		abort(404);
	// 	}
	// }
}
