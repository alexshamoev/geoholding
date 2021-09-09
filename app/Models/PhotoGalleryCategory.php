<?php

namespace App\Models;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;

class PhotoGalleryCategory extends Model {

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'photo_gallery_step_0';

	public function getData($lang) {
		$updatedData = (object) array();
		$updatedData -> title = '';
		$updatedData -> alias = '';
		$updatedData -> text = '';

		if($this -> published) {
			$updatedData = $this;
			
			foreach(Language :: where('published', 1) -> get() as $data) {
				if($data -> title === $lang) {
					$updatedData -> alias = $this -> { 'title_'.$lang };
					$updatedData -> title = $this -> { 'alias_'.$lang };
					$updatedData -> text = $this -> { 'text_'.$lang };
				}
			}
		}

		return $updatedData;
	}


    public static function getFullData($lang) {
		$newsPage = Page :: where('slug', 'photo-gallery') -> first();

		$news = self :: where('published', 1) -> get();
		$newsUpdatedData = $news;

		$i = 0;

		foreach($newsUpdatedData as $data) {
			$newsUpdatedData[$i] -> alias = $newsUpdatedData[$i] -> { 'alias_'.$lang };
			$newsUpdatedData[$i] -> title = $newsUpdatedData[$i] -> { 'title_'.$lang };
			$newsUpdatedData[$i] -> text = $newsUpdatedData[$i] -> { 'text_'.$lang };
			
			$newsUpdatedData[$i] -> fullUrl = '/'.$lang.'/'.$newsPage -> { 'alias_'.$lang }.'/'.$newsUpdatedData[$i] -> alias;


			$i++;
		}


		return $newsUpdatedData;
	}
}
