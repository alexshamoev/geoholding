<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App;


class Language extends Model {
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'languages';
	
	private static $model;


	public static function setActiveInfoBlock($model) {
		self::$model = $model;
	}


	public function getFullUrlAttribute() {
		$modelObject = self::$model;

		return $modelObject->getFullUrl($this->title);

		// dd(self::$model);

		// return $this->title;
	}


	public function getIsActiveAttribute() {
		if(App::getLocale() == $this->title) {
			return true;
		}

		return false;
    }

	
	public static function deleteEmpty() {
		$validateRules = array(
			'title' => 'required|min:2|max:20',
			'full_title' => 'required|min:2|max:20'
		);
		
		foreach(Language::all() as $data) {
			$languageData['title'] = $data->title;
			$languageData['full_title'] = $data->full_title;

			// Validation
				$validator = Validator::make($languageData, $validateRules);

				if($validator->fails()) {
					Language::destroy($data->id);
				}
			//
		}
	}
}
