<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\ModuleStep;
use App\Models\ModuleBlock;
use App\Models\ModulesIncludesValue;
use App\Models\ModulesNotIncludesValue;
use App\Models\Language;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class AController extends Controller {
	public function getDefaultPage() {
		$firstModule = Module :: orderBy('rang', 'desc') -> first();

		return redirect('/admin/'.$firstModule -> alias);
	}


	public static function getDefaultData() {
		$bsc = Bsc :: getFullData();
		$copyrightDate = $bsc -> year_of_site_creation;

		if($bsc -> year_of_site_creation < date('Y')) {
			$copyrightDate .= ' - '.date('Y');
		}

		
		$modulesForMenu = array();

		foreach(Module :: all() -> sortByDesc('rang') as $data) {
			if($data -> hide_for_admin === 0) {
				$modulesForMenu[] = $data;
			}
		}

		$data = ['modules' => Module :: all() -> sortByDesc('rang'),
				'modulesForMenu' => $modulesForMenu,
				'bsc' => Bsc :: getFullData(),
				'bsw' => Bsw :: getFullData(Language :: where('like_default_for_admin', 1) -> first() -> title),
				'copyrightDate' => $copyrightDate,
				'languages' => Language :: where('disable', 0) -> get(),
				'activeUser' => Auth :: user()];

		return $data;
	}
}