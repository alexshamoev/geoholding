<?php
namespace App;


use App\Models\Module;
use App\Models\ModulesIncludesValue;
use App\Models\ModulesNotIncludesValue;


class Widget {
	public static function getVisibility($page) {
		$widgetsVisibility = [];

        foreach(Module :: all() as $data) {
			$widgetsVisibility[$data['alias']] = self :: checkForVisibility($page, $data);
		}

		return $widgetsVisibility;
	}


    private static function checkForVisibility($page, $module) {
		$result = false;

		switch($module -> include_type) {
			case 1:
				$result = true;

				break;
			case 2:
				if(ModulesIncludesValue :: where([['module', $module -> id], ['include_in', $page -> id]]) -> first()) {
					$result = true;
				}

				break;
			case 3:
				if(!ModulesNotIncludesValue :: where([['module', $module -> id], ['include_in', $page -> id]]) -> first()) {
					$result = true;
				}
				
				break;
		}

		return $result;
	}
}