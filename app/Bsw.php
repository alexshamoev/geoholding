<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bsw extends Model
{
    public static function getFullData($lang) {
		$bsws = (object)[];

		foreach(Bsw :: all() as $data) {
			$varSystemWord = $data -> system_word;
			$varWord = 'word_'.$lang;

			$bsws -> $varSystemWord = $data -> $varWord;
		}

		return $bsws;
	}
}
