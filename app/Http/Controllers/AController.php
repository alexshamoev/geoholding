<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\ModuleStep;
use App\Models\ModuleBlock;
use App\Models\ModulesIncludesValue;
use App\Models\ModulesNotIncludesValue;
use App\Models\Language;
use App\Models\Page;
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
		$activeUser = Auth :: user();
		$copyrightDate = config('constants.year_of_site_creation');

		if($copyrightDate < date('Y')) {
			$copyrightDate .= ' - '.date('Y');
		}

		
		$modulesForMenu = array();

		foreach(Module :: all() -> sortByDesc('rang') as $data) {
			if($activeUser -> super_administrator === 1) {
				$modulesForMenu[] = $data;
			} else if($data -> hide_for_admin === 0) {
				$modulesForMenu[] = $data;
			}
		}

		$data = [
					'modules' => Module :: all() -> sortByDesc('rang'),
					'modulesForMenu' => $modulesForMenu,
					'bsc' => Bsc :: getFullData(),
					'bsw' => Bsw :: getFullData(),
					'copyrightDate' => $copyrightDate,
					'languages' => Language :: where('disable', 0) -> orderByDesc('rang') -> get(),
					'activeUser' => Auth :: user()
				];

		return $data;
	}

	public static function deleteEmptyBlocks() {
		Bsc :: deleteEmpty();
		Bsw :: deleteEmpty();
		Language :: deleteEmpty();
		Module :: deleteEmpty();
		ModuleStep :: deleteEmpty();
		ModuleBlock :: deleteEmpty();

		ACoreControllerStep0 :: deleteEmpty();
		// ACoreControllerStep1 :: deleteEmpty();
		// ACoreControllerStep2 :: deleteEmpty();
		// ACoreControllerStep3 :: deleteEmpty();
	}
}