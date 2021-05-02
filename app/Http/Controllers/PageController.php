<?php

namespace App\Http\Controllers;

use App\Page;
use App\MenuButton;
use App\Language;
use App\Module;
use App\Bsc;
use App\Bsw;
use App\News;
use App\Partner;
use App\Widget;
use Illuminate\Http\Request;


class PageController extends Controller {
	public function getDefaultPageWithDefaultLanguage() {
		$page = Page :: where('like_default', 1) -> first();
		$language = Language :: where('like_default', 1) -> first();

		if($language && $page) {
			$page_template = 'static';
			
			$active_module = Module :: where('page', $page -> id) -> first();
			
			if($active_module) {
				$page_template = 'modules.'.$active_module -> alias.'.step0';
			}


			$widgetGetVisibility = Widget :: getVisibility($page);



			return view($page_template, ['page' => $page -> getFullData($language -> title),
											'menuButtons' => MenuButton :: getFullData($language -> title),
											'languages' => Language :: getFullData($language -> title, $page),
											'bsc' => Bsc :: getFullData(),
											'bsw' => Bsw :: getFullData($language -> title),
											'registrationUrl' => '/'.$language -> title.'/'.Page :: where('slug', 'registration') -> first() -> getFullData($language -> title) -> alias,
											'authorizationUrl' => '/'.$language -> title.'/'.Page :: where('slug', 'authorization') -> first() -> getFullData($language -> title) -> alias,
											'partners' => Partner :: getFullData($language -> title),
											'widgetGetVisibility' => $widgetGetVisibility]);
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

				
				$widgetGetVisibility = Widget :: getVisibility($page);

				
				return view($page_template, ['page' => $page -> getFullData($lang),
											 'menuButtons' => MenuButton :: getFullData($lang),
											 'languages' => Language :: getFullData($lang, $page),
											 'bsc' => Bsc :: getFullData(),
											 'bsw' => Bsw :: getFullData($language -> title),
											 'registrationUrl' => '/'.$lang.'/'.Page :: where('slug', 'registration') -> first() -> getFullData($lang) -> alias,
											 'authorizationUrl' => '/'.$lang.'/'.Page :: where('slug', 'authorization') -> first() -> getFullData($lang) -> alias,
											 'partners' => Partner :: getFullData($lang),
											 'widgetGetVisibility' => $widgetGetVisibility]);
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


				$widgetGetVisibility = Widget :: getVisibility($page);
				

			
				if($active_module) {
					switch($active_module -> alias) {
						case 'news':
							return view('modules.news.step0', ['page' => $page -> getFullData($lang),
										'menuButtons' => MenuButton :: getFullData($lang),
										'languages' => Language :: getFullData($lang, $page),
										'bsc' => Bsc :: getFullData(),
										'bsw' => Bsw :: getFullData($language -> title),
										'registrationUrl' => '/'.$lang.'/'.Page :: where('slug', 'registration') -> first() -> getFullData($lang) -> alias,
										'authorizationUrl' => '/'.$lang.'/'.Page :: where('slug', 'authorization') -> first() -> getFullData($lang) -> alias,
										'newsStep0' => News :: getFullData($lang),
										'partners' => Partner :: getFullData($lang),
										'widgetGetVisibility' => $widgetGetVisibility]);
							
							break;
						case 'partners':
							return view('modules.partners.step0', ['page' => $page -> getFullData($lang),
										'menuButtons' => MenuButton :: getFullData($lang),
										'languages' => Language :: getFullData($lang, $page),
										'bsc' => Bsc :: getFullData(),
										'bsw' => Bsw :: getFullData($language -> title),
										'registrationUrl' => '/'.$lang.'/'.Page :: where('slug', 'registration') -> first() -> getFullData($lang) -> alias,
										'authorizationUrl' => '/'.$lang.'/'.Page :: where('slug', 'authorization') -> first() -> getFullData($lang) -> alias,
										'partners' => Partner :: getFullData($lang),
										'widgetGetVisibility' => $widgetGetVisibility]);
							
							break;
					}
				}

				return view('static', ['page' => $page -> getFullData($lang),
										'menuButtons' => MenuButton :: getFullData($lang),
										'languages' => Language :: getFullData($lang, $page),
										'bsc' => Bsc :: getFullData(),
										'bsw' => Bsw :: getFullData($language -> title),
										'registrationUrl' => '/'.$lang.'/'.Page :: where('slug', 'registration') -> first() -> getFullData($lang) -> alias,
										'authorizationUrl' => '/'.$lang.'/'.Page :: where('slug', 'authorization') -> first() -> getFullData($lang) -> alias,
										'partners' => Partner :: getFullData($lang),
										'widgetGetVisibility' => $widgetGetVisibility]);
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


				$widgetGetVisibility = Widget :: getVisibility($page);
				
			
				if($active_module) {
					switch($active_module -> alias) {
						case 'news':
							$activeNews = News :: where('alias_'.$lang, $stepAlias) -> first();

							return view('modules.news.step1', ['page' => $page -> getFullData($lang),
										'menuButtons' => MenuButton :: getFullData($lang),
										'languages' => Language :: getFullData($lang, $page),
										'bsc' => Bsc :: getFullData(),
										'bsw' => Bsw :: getFullData($language -> title),
										'registrationUrl' => '/'.$lang.'/'.Page :: where('slug', 'registration') -> first() -> getFullData($lang) -> alias,
										'authorizationUrl' => '/'.$lang.'/'.Page :: where('slug', 'authorization') -> first() -> getFullData($lang) -> alias,
										'newsStep0' => News :: getFullData($lang),
										'activeNews' => $activeNews -> getData($lang),
										'partners' => Partner :: getFullData($lang),
										'widgetGetVisibility' => $widgetGetVisibility]);
							
							break;
					}
				}

				return view('static', ['page' => $page -> getFullData($lang),
										'menuButtons' => MenuButton :: getFullData($lang),
										'languages' => Language :: getFullData($lang, $page),
										'bsc' => Bsc :: getFullData(),
										'bsw' => Bsw :: getFullData($language -> title),
										'registrationUrl' => '/'.$lang.'/'.Page :: where('slug', 'registration') -> first() -> getFullData($lang) -> alias,
										'authorizationUrl' => '/'.$lang.'/'.Page :: where('slug', 'authorization') -> first() -> getFullData($lang) -> alias,
										'partners' => Partner :: getFullData($lang),
										'widgetGetVisibility' => $widgetGetVisibility]);
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
