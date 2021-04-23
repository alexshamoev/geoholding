<?php
namespace App;


use App\Module;
use App\ModulesIncludesValue;
use App\ModulesNotIncludesValue;


class Widget {
    public static function getTemp($page, $module) {
        // $module = Module :: where('include_type', 'photo_gallery') -> first();

        // foreach(Module :: all() as $data) {
            $result = 'no';

            switch($module -> include_type) {
                case 1:
                    $result = 'yes';

                    break;
                case 2:
                    if(ModulesIncludesValue :: where(['module', $module -> id], ['page', $page -> id]) -> first()) {
                        $result = 'yes';
                    }

                    break;
                case 3:
                    if(!ModulesNotIncludesValue :: where(['module', $module -> id], ['page', $page -> id]) -> first()) {
                        $result = 'yes';
                    }
                    
                    break;
            }
        // }

		return $result;
	}
}