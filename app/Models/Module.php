<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Module extends Model {
    public static function deleteEmpty() {
		$validateRules = array(
			'alias' => 'required|min:2',
			'title' => 'required|min:2'
		);
		
        // Validation
            foreach(Module :: all() as $data) {
                $moduleData['alias'] = $data -> alias;
                $moduleData['title'] = $data -> title;

                $validator = Validator :: make($moduleData, $validateRules);

                if($validator -> fails()) {
                    Module :: destroy($data -> id);
                }
            }
        //
	}

    public static function destroy($id) {
		Parent :: destroy($id);

        foreach(ModuleStep :: where('top_level', $id) -> get() as $data) {
            ModuleStep :: destroy($data -> id);
        }
	}
}
