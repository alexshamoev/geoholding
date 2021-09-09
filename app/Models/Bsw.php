<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bsw extends Model
{
    public static function getFullData($lang) {
		$bsws = (object)[];

		foreach(Bsw :: all() as $data) {
			$bsws -> { $data -> system_word } = $data -> { 'word_'.$lang };
		}
		
		return $bsws;
	}
}
