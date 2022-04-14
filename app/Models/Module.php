<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


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


    public function page() {
        return $this -> hasOne(Page :: class, 'id', 'page_id');
    }


    public function moduleLevel() {
        return $this -> hasMany(ModuleLevel :: class, 'top_level', 'id') -> orderBy('rang', 'desc');
    }
}