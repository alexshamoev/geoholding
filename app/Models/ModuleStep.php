<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ModuleStep extends Model {
    public static function deleteEmpty() {
		$validateRules = array(
			'title' => 'required|min:2',
			'db_table' => 'required|min:2'
		);
		
        // Validation
            foreach(ModuleStep::get() as $data) {
                $moduleStepData['title'] = $data -> title;
                $moduleStepData['db_table'] = $data -> db_table;

                $validator = Validator :: make($moduleStepData, $validateRules);

                if($validator -> fails()) {
                    ModuleStep :: destroy($data -> id);
                }
            }
        //
	}


    public function moduleLevel() {
        return $this -> hasOne(ModuleLevel :: class, 'id', 'top_level');
    }


    public function moduleBlock() {
        return $this -> hasMany(ModuleBlock :: class, 'top_level', 'id') -> orderBy('rang', 'desc');
    }
}