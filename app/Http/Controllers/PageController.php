<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\MenuButton;
use App\Models\Language;
use App\Models\Module;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\News;
use App\Models\PhotoGalleryCategory;
use App\Models\Partner;
use App\Widget;
use Illuminate\Http\Request;


class PageController extends Controller {
	public static function getDefaultData($lang, $page) {
		$widgetGetVisibility = Widget :: getVisibility($page);

		$bsc = Bsc :: getFullData();
		$copyrightDate = $bsc -> year_of_site_creation;

		if($bsc -> year_of_site_creation < date('Y')) {
			$copyrightDate .= ' - '.date('Y');
		}

		Partner :: setLang($lang -> title);

		$data = ['page' => $page,
				'language' => $lang,
				'menuButtons' => MenuButton :: where('published', '1') -> orderByDesc('rang') -> get(),
				'languages' => Language :: getFullData($lang -> title, $page),
				'bsc' => Bsc :: getFullData(),
				'bsw' => Bsw :: getFullData($lang -> title),
				'registrationUrl' => '/'.$lang -> title.'/'.Page :: where('slug', 'registration') -> first() -> alias,
				'authorizationUrl' => '/'.$lang -> title.'/'.Page :: where('slug', 'authorization') -> first() -> alias,
				'partners' => Partner :: where('published', '1') -> orderByDesc('rang') -> get(),
				'widgetGetVisibility' => $widgetGetVisibility,
				'copyrightDate' => $copyrightDate];

		return $data;
	}

	
	public function getDefaultPageWithDefaultLanguage() {
		$language = Language :: where('like_default', 1) -> first();
		
		Page :: setLang($language -> title);

		$page = Page :: where('like_default', 1) -> first();

		MenuButton :: setLang($language -> title);
		MenuButton :: setPage($page -> alias);

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
			Page :: setLang($language -> title);

			$page = Page :: where('like_default', 1) -> first();

			MenuButton :: setLang($language -> title);
			MenuButton :: setPage($page -> alias);

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


	public static function getPage($lang, $alias) {
		$language = Language :: where('title', $lang) -> first();

		if($language) {
			$page = Page :: where('alias_'.$language -> title, $alias) -> first();

			if($page) {
				// $active_module = Module :: where('page', $page -> id) -> first();

			
				// if($active_module) {
				// 	switch($active_module -> alias) {
				// 		case 'news':
				// 			return NewsController :: getStep0($language, $page);
							
				// 			break;
				// 		case 'photo_gallery':
				// 			return PhotoGalleryController :: getStep0($language, $page);
							
				// 			break;
				// 	}
				// }

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
			$page = Page :: where('alias_'.$language -> title, $pageAlias) -> first();

			if($page) {
				$active_module = Module :: where('page', $page -> id) -> first();
			
				if($active_module) {
					switch($active_module -> alias) {
						case 'news':
							return NewsController :: getStep1($language, $pageAlias, $stepAlias, $page);

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
