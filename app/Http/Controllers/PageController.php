<?php

namespace App\Http\Controllers;

use App\Page;
use App\MenuButton;
use App\Language;
use App\Module;
use App\Bsc;
use App\Bsw;
use Illuminate\Http\Request;

class PageController extends Controller {
	public function getDefaultPageWithDefaultLanguage() {
		$page = Page :: where('like_default', 1) -> first();
		$language = Language :: where('like_default', 1) -> first();

		if($language && $page) {
			$page_template = 'static';
			
			$active_module = Module :: where('page', $page -> id) -> first();
			
			if($active_module) {
				$page_template = $active_module -> alias;
			}

			return view($page_template, ['page' => $page -> getFullData($language -> title),
											'menuButtons' => MenuButton :: getFullData($language -> title),
											'languages' => Language :: getFullData($language -> title, $page),
											'bsc' => Bsc :: getFullData(),
											'bsw' => Bsw :: getFullData($language -> title),
											'registrationUrl' => '/'.$language -> title.'/'.Page :: where('slug', 'registration') -> first() -> getFullData($language -> title) -> alias,
											'authorizationUrl' => '/'.$language -> title.'/'.Page :: where('slug', 'authorization') -> first() -> getFullData($language -> title) -> alias]);
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
					$page_template = $active_module -> alias;
				}
				
				return view($page_template, ['page' => $page -> getFullData($lang),
											 'menuButtons' => MenuButton :: getFullData($lang),
											 'languages' => Language :: getFullData($lang, $page),
											 'bsc' => Bsc :: getFullData(),
											 'bsw' => Bsw :: getFullData($language -> title),
											 'registrationUrl' => '/'.$lang.'/'.Page :: where('slug', 'registration') -> first() -> getFullData($lang) -> alias,
											 'authorizationUrl' => '/'.$lang.'/'.Page :: where('slug', 'authorization') -> first() -> getFullData($lang) -> alias]);
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
				$page_template = 'static';
			
				$active_module = Module :: where('page', $page -> id) -> first();
			
				if($active_module) {
					$page_template = $active_module -> alias;
				}

				return view($page_template, ['page' => $page -> getFullData($lang),
											 'menuButtons' => MenuButton :: getFullData($lang),
											 'languages' => Language :: getFullData($lang, $page),
											 'bsc' => Bsc :: getFullData(),
											 'bsw' => Bsw :: getFullData($language -> title),
											 'registrationUrl' => '/'.$lang.'/'.Page :: where('slug', 'registration') -> first() -> getFullData($lang) -> alias,
											 'authorizationUrl' => '/'.$lang.'/'.Page :: where('slug', 'authorization') -> first() -> getFullData($lang) -> alias]);
			} else {
				abort(404);
			}
		} else {
			abort(404);
		}
	}
}
