<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ModuleBlock extends Model {
    public static function deleteEmpty() {
		$validateRules = array(
			'db_column' => 'required|min:2'
		);
		
        // Validation
            foreach(ModuleBlock :: all() as $data) {
                $moduleBlockData['db_column'] = $data -> db_column;

                $validator = Validator :: make($moduleBlockData, $validateRules);

                if($validator -> fails()) {
                    ModuleBlock :: destroy($data -> id);
                }
            }
        //
	}


    public function moduleStep() {
        return $this -> hasOne(ModuleStep :: class, 'id', 'top_level');
    }
}
