<?php
namespace App;


use App\Models\Module;
use App\Models\ModuleStep;
use App\Models\ModulesIncludesValue;
use App\Models\ModulesNotIncludesValue;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\Language;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ADefaultData {
	public static function get() {
		$bsc = Bsc :: getFullData();
		$copyrightDate = $bsc -> year_of_site_creation;

		if($bsc -> year_of_site_creation < date('Y')) {
			$copyrightDate .= ' - '.date('Y');
		}

		
		$modules = array();

		foreach(Module :: all() -> sortByDesc('rang') as $data) {
			// if(ModuleStep :: where('top_level', $data['id']) -> first()) {
			// 	$modules[] = $data;
			// }

			if($data['hide_for_admin'] == 0) {
				$modules[] = $data;
			}
		}

		$data = ['modules' => $modules,
				'bsc' => Bsc :: getFullData(),
				'bsw' => Bsw :: getFullData(Language :: where('like_default_for_admin', 1) -> first() -> title),
				'copyrightDate' => $copyrightDate,
				'activeUser' => Auth :: user()];

		return $data;
	}
}