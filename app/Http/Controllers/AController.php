<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\ModuleBlock;
use App\Models\Language;
use App\Models\Bsc;
use App\Models\Bsw;
use Illuminate\Support\Facades\Auth;
use Session;


class AController extends Controller {
	public function getDefaultPage() {
		$firstModule = Module::orderBy('rang', 'desc')->first();

		return redirect('/admin/'.$firstModule->alias);
	}

	
	public static function getDefaultData() {
		$bsc = Bsc::getFullData();
		$activeUser = Auth::guard('admin')->user();
		$copyrightDate = config('constants.year_of_site_creation');

		if($copyrightDate < date('Y')) {
			$copyrightDate .= ' - '.date('Y');
		}

		
		$modulesForMenu = collect([]);

		foreach(Module::with(['moduleStep'])->get()->sortByDesc('rang') as $data) {
			if(count($data->moduleStep) || \View::exists('modules/'.$data->alias.'/admin_panel/start_point')) {
				if($activeUser->super_administrator === 1 || $data->hide_for_admin === 0) {
					$modulesForMenu->add($data);
				}
			}
		}

		$data = [
					'modules' => Module::with(['moduleStep'])->get()->sortByDesc('rang'),
					'modulesForMenu' => $modulesForMenu,
					'bsc' => Bsc::getFullData(),
					'bsw' => Bsw::getFullData(),
					'copyrightDate' => $copyrightDate,
					'languages' => Language::where('disable', 0)->orderByDesc('rang')->get(),
					'activeUser' => Auth::guard('admin')->user()
				];
		
		return $data;
	}
}