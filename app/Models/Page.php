<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pages_step_0';

    public function getFullData($lang) {
		$pageUpdatedData = (object) array();
		$pageUpdatedData -> title = '';
		$pageUpdatedData -> alias = '';
		$pageUpdatedData -> text = '';

		if($this -> published) {
			$pageUpdatedData = $this;
			
			foreach(Language :: where('published', 1) -> get() as $data) {
				if($data -> title === $lang) {
					$pageUpdatedData -> title = $this -> { 'title_'.$lang };
					$pageUpdatedData -> alias = $this -> { 'alias_'.$lang };
					$pageUpdatedData -> text = $this -> { 'text_'.$lang };
				}
			}
		}

		return $pageUpdatedData;
	}
}