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
		$firstModul = Module :: orderBy('rang', 'desc') -> first();
		$firstModulTitle = $firstModul -> alias;

		return redirect("/admin/$firstModulTitle");
		
		// return $firstModul -> alias;
	}
}