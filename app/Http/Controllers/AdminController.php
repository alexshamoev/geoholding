<?php

namespace App\Http\Controllers;

use App\Module;
use App\ModuleStep;
use App\ModuleBlock;
use App\Language;
use App\Bsc;
use App\Bsw;
use App\ADefaultData;
use Illuminate\Http\Request;
use DB;


class AdminController extends Controller {
	public function getDefaultPage() {
		$firstModul = Module :: orderBy('rang', 'desc') -> first();
		$firstModulTitle = $firstModul -> alias;

		return redirect("/admin/$firstModulTitle");
		
		// return $firstModul -> alias;
	}
}