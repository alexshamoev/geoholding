<?php

namespace App;

use App\Page;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'partners_step_0';


    public function getData($lang) {
		$updatedData = (object) array();
		$updatedData -> title = '';

		if($this -> published) {
			$updatedData = $this;
			
			foreach(Language :: where('published', 1) -> get() as $data) {
				if($data -> title === $lang) {
					$var_title = 'title_'.$lang;


					$updatedData -> title = $this -> $var_title;
				}
			}
		}

		return $updatedData;
	}


    public static function getFullData($lang) {
		$newsPage = Page :: where('slug', 'partners') -> first();

		$news = self :: where('published', 1) -> get();
		$newsUpdatedData = $news;

		$i = 0;

		foreach($newsUpdatedData as $data) {
			$var_title = 'title_'.$lang;

			$newsUpdatedData[$i] -> title = $newsUpdatedData[$i] -> $var_title;


			$i++;
		}


		return $newsUpdatedData;
	}
}
