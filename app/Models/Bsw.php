<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Bsw extends Model {
    public static function getFullData($lang) {
		$bsws = (object)[];

		foreach(Bsw :: all() as $data) {
			$bsws -> { $data -> system_word } = $data -> { 'word_'.$lang };
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
