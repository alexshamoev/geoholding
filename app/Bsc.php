<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bsc extends Model
{
    public static function getFullData() {
		$bscs = (object)[];

		foreach(Bsc :: all() as $data) {
			$varSystemWord = $data -> system_word;

			$bscs -> $varSystemWord = $data -> configuration;
		}

		return $bscs;
	}
}