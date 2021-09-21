<?php

namespace App\Models;

use App\Models\Page;
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
					$updatedData -> title = $this -> { 'title_'.$lang };
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
			$newsUpdatedData[$i] -> title = $newsUpdatedData[$i] -> { 'title_'.$lang };

			$i++;
		}


		return $newsUpdatedData;
	}
}
