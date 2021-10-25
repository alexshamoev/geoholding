<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\ModuleStep;
use App\Models\ModuleBlock;
use App\Models\Language;
use App\Models\Bsc;
use App\Models\Bsw;
use App\ADefaultData;
use Illuminate\Http\Request;
use DB;


class AController extends Controller {
	public function getDefaultPage() {
		$firstModule = Module :: orderBy('rang', 'desc') -> first();
		$firstModuleTitle = $firstModule -> alias;

		return redirect("/admin/$firstModuleTitle");
		
		// return $firstModule -> alias;
	}
}