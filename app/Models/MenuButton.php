<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuButton extends Model {
    public static function getFullData($lang) {
		$menuButtons = self :: where('published', 1) -> orderByDesc('rang') -> get();

		$menuButtonsUpdatedData = $menuButtons;


		$currentLanguage = Language :: where('title', $lang) -> where('published', 1) -> first();


		$i = 0;

		foreach($menuButtonsUpdatedData as $data) {
			$menuButtonsUpdatedData[$i] -> title = '';
			$menuButtonsUpdatedData[$i] -> url = '';

			$menuPage = Page :: where('id', $data -> page) -> where('published', 1) -> first();

			if($menuPage) {
				$var_title = 'title_'.$lang;

				$menuButtonsUpdatedData[$i] -> title = $data -> $var_title;

				if($menuPage -> like_default) {
					if($currentLanguage -> like_default) {
						$menuButtonsUpdatedData[$i] -> url = '/';
					} else {
						$menuButtonsUpdatedData[$i] -> url = '/'.$lang;
					}
				} else {
					$var_alias = 'alias_'.$lang;

					$menuButtonsUpdatedData[$i] -> url = '/'.$lang.'/'.$menuPage -> $var_alias;
				}
			}


			$i++;
		}


		return $menuButtonsUpdatedData;
	}
}
