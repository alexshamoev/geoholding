<?php
namespace App;


use App\Module;
use App\ModulesIncludesValue;
use App\ModulesNotIncludesValue;


class ADefaultData {
	public static function get() {
		$bsc = Bsc :: getFullData();
		$copyrightDate = $bsc -> year_of_site_creation;

		if($bsc -> year_of_site_creation < date('Y')) {
			$copyrightDate .= ' - '.date('Y');
		}

		$data = ['modules' => Module :: all(),
				'bsc' => Bsc :: getFullData(),
				'bsw' => Bsw :: getFullData(Language :: where('like_default_for_admin', 1) -> first() -> title),
				'copyrightDate' => $copyrightDate];

		return $data;
	}
}