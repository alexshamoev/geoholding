<?php

namespace App;

use App\Page;
use Illuminate\Database\Eloquent\Model;

class News extends Model {
	public function getData($lang) {
		$updatedData = (object) array();
		$updatedData -> title = '';
		$updatedData -> alias = '';
		$updatedData -> text = '';

		if($this -> published) {
			$updatedData = $this;
			
			foreach(Language :: where('published', 1) -> get() as $data) {
				if($data -> title === $lang) {
					$var_title = 'title_'.$lang;
					$var_alias = 'alias_'.$lang;
					$var_text = 'text_'.$lang;


					$updatedData -> title = $this -> $var_title;
					$updatedData -> alias = $this -> $var_alias;
					$updatedData -> text = $this -> $var_text;
				}
			}
		}

		return $updatedData;
	}


    public static function getFullData($lang) {
		$newsPage = Page :: where('slug', 'news') -> first();

		$news = self :: where('published', 1) -> get();
		$newsUpdatedData = $news;

		$i = 0;

		foreach($newsUpdatedData as $data) {
			$varAlias = 'alias_'.$lang;
			$var_title = 'title_'.$lang;
			$var_text = 'text_'.$lang;

			$newsUpdatedData[$i] -> alias = $newsUpdatedData[$i] -> $varAlias;
			$newsUpdatedData[$i] -> title = $newsUpdatedData[$i] -> $var_title;
			$newsUpdatedData[$i] -> text = $newsUpdatedData[$i] -> $var_text;
			
			$newsUpdatedData[$i] -> fullUrl = '/'.$lang.'/'.$newsPage -> $varAlias.'/'.$newsUpdatedData[$i] -> alias;


			$i++;
		}


		return $newsUpdatedData;
	}
}
