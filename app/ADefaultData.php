<?php
namespace App;


use App\Models\Module;
use App\Models\ModulesIncludesValue;
use App\Models\ModulesNotIncludesValue;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\Language;


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