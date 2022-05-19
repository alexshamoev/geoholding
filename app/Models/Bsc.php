<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App;

class Bsc extends Model {
    public static function getFullData() {
		$bscs = (object)[];

		foreach(Bsc::all() as $data) {
			$bscs->{ $data->system_word } = $data->configuration;
		}

		return $bscs;
	}
}