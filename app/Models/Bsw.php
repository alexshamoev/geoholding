<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App;

class Bsw extends Model {
    public static function getFullData() {
		$bsws = (object)[];

		foreach(Bsw :: all() as $data) {
			$bsws -> { $data -> system_word } = $data -> { 'word_'.App :: getLocale() };
		}
		
		return $bsws;
	}


	public static function deleteEmpty() {
		$validateRules = array(
			'system_word' => 'required|min:2'
		);
		
		foreach(Bsw :: all() as $data) {
			$bswData['system_word'] = $data -> system_word;

			// Validation
				$validator = Validator :: make($bswData, $validateRules);

				if($validator -> fails()) {
					Bsw :: destroy($data -> id);
				}
			//
		}
	}
}
