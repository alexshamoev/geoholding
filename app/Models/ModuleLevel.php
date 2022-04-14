<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ModuleLevel extends Model {
    /*public static function deleteEmpty() {
		$validateRules = array(
			'title' => 'required|min:2'
		);
		
        // Validation
            foreach(ModuleLevel :: all() as $data) {
                $moduleLevelData['title'] = $data -> db_column;

                $validator = Validator :: make($moduleLevelData, $validateRules);

                if($validator -> fails()) {
                    ModuleLevel :: destroy($data -> id);
                }
            }
        //
	}*/


    public function module() {
        return $this -> hasOne(Module :: class, 'id', 'top_level');
    }


    public function moduleStep() {
        return $this -> hasMany(ModuleStep :: class, 'top_level', 'id');
    }
}
