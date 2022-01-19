<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ModuleStep extends Model
{
    public static function deleteEmpty() {
		$validateRules = array(
			'title' => 'required|min:2',
			'db_table' => 'required|min:2'
		);
		
        // Validation
            foreach(ModuleStep :: all() as $data) {
                $moduleStepData['title'] = $data -> title;
                $moduleStepData['db_table'] = $data -> db_table;

                $validator = Validator :: make($moduleStepData, $validateRules);

                if($validator -> fails()) {
                    ModuleStep :: destroy($data -> id);
                }
            }
        //
	}

    public static function destroy($id) {
		Parent :: destroy($id);

        foreach(ModuleBlock :: where('top_level', $id) -> get() as $data) {
            ModuleBlock :: destroy($data -> id);
        }
	}
}
