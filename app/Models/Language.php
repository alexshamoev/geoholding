<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model {
    public static function getFullData($lang, $page) {
		$languages = self :: where('published', 1) -> get();

		$languagesUpdatedData = $languages;
 

		$i = 0;

		foreach($languagesUpdatedData as $data) {
			$languagesUpdatedData[$i] -> full_url = '';
			$languagesUpdatedData[$i] -> active = false;
			
			
			if($page -> like_default) {
				if($data -> like_default) {
					$languagesUpdatedData[$i] -> full_url = '/';
				} else {
					$languagesUpdatedData[$i] -> full_url = '/'.$data -> title;
				}
			} else {
				$var_alias = 'alias_'.$data -> title;

				$languagesUpdatedData[$i] -> full_url = '/'.$data -> title.'/'.$page -> $var_alias;
			}

			if($lang === $data -> title) {
				$languagesUpdatedData[$i] -> active = true;
			}


			$i++;
		}


		return $languagesUpdatedData;
	}
}
