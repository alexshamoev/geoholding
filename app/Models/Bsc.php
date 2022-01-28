<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;


class Bsc extends Model {
    public static function getFullData() {
		$bscs = (object)[];

		foreach(Bsc :: all() as $data) {
			$bscs -> { $data -> system_word } = $data -> configuration;
		}

		return $bscs;
	}


	public static function deleteEmpty() {
		$validateRules = array(
			'system_word' => 'required|min:2'
		);
		
		foreach(Bsc :: all() as $data) {
			$bscData['system_word'] = $data -> system_word;

			// Validation
				$validator = Validator :: make($bscData, $validateRules);

				if($validator -> fails()) {
					self :: destroy($data -> id);
				}
			//
		}
	}
}