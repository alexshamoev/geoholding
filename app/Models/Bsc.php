<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App;

class Bsc extends Model {
    public static function initConfigs() {
		foreach(Bsc::all() as $data) {
			config(['bsc.'.$data->system_word => $data->configuration]);
		}
	}
}