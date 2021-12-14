<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuButtonStep0 extends Model {
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menu_buttons_step_0';


	private static $lang;
	private static $pageAlias;


	public static function setLang($value) {
		self :: $lang = $value;
	}


	public static function setPage($value) {
		self :: $pageAlias = $value;
	}


	public function getTitleAttribute() {
        return $this -> { 'title_'.self :: $lang };
    }


	public function getFreeLinkAttribute() {
        return $this -> { 'free_link_'.self :: $lang };
    }
	

	public function getUrlTargetAttribute() {
		if($this -> open_in_new_tab) {
			return '_blank';
		}
		
		return '_self';
    }


	public function getUrlAttribute() {
		switch($this -> link_type) {
			case 'page':
				$page = Page :: where('id', $this -> page) -> where('published', 1) -> first();

				return '/'.self :: $lang.'/'.$page -> alias;

				break;
			case 'free_link':
				return $this -> freeLink;

				break;
			case 'without_link':
				return false;

				break;
		}
    }


	public function getActiveAttribute() {
		$page = Page :: where('id', $this -> page) -> where('published', 1) -> first();

		if($page -> alias === self :: $pageAlias) {
        	return 1;
		} else {
			return 0;
		}
    }


	public function getSubMenuButtonsAttribute() {
		// $subMenuButtons = MenuButtonStep1 :: where('published', '1') -> where('parent', $this -> id) -> orderByDesc('rang') -> get();

        return MenuButtonStep1 :: where('published', '1') -> where('parent', $this -> id) -> orderByDesc('rang') -> get();
    }


    // public static function getFullData($lang) {
	// 	$menuButtons = self :: where('published', 1) -> orderByDesc('rang') -> get();

	// 	$menuButtonsUpdatedData = $menuButtons;


	// 	$currentLanguage = Language :: where('title', $lang) -> where('published', 1) -> first();


	// 	$i = 0;

	// 	foreach($menuButtonsUpdatedData as $data) {
	// 		$menuButtonsUpdatedData[$i] -> title = '';
	// 		$menuButtonsUpdatedData[$i] -> url = '';

	// 		$menuPage = Page :: where('id', $data -> page) -> where('published', 1) -> first();

	// 		if($menuPage) {
	// 			$menuButtonsUpdatedData[$i] -> title = $data -> { 'title_'.$lang };

	// 			if($menuPage -> like_default) {
	// 				if($currentLanguage -> like_default) {
	// 					$menuButtonsUpdatedData[$i] -> url = '/';
	// 				} else {
	// 					$menuButtonsUpdatedData[$i] -> url = '/'.$lang;
	// 				}
	// 			} else {
	// 				$menuButtonsUpdatedData[$i] -> url = '/'.$lang.'/'.$menuPage -> { 'alias_'.$lang };
	// 			}
	// 		}


	// 		$i++;
	// 	}


	// 	return $menuButtonsUpdatedData;
	// }
}
