<?php

namespace App\Http\Controllers;

use App\Module;
use App\ModuleStep;
use App\ModuleBlock;
use App\Page;
use App\Language;
use App\Bsw;
use App\ModulesIncludesValue;
use Illuminate\Http\Request;

class ModuleController extends Controller {
    public function getStartPoint() {
		return view('modules.modules.admin_panel.start_point', ['modules' => Module :: all()]);
	}


	public function add() {
		$module = new Module();

		$module -> alias = 'temp';

		$module -> save();


		return redirect() -> route('moduleEdit', $module -> id);
	}


	public function edit($id) {
		$module = Module :: find($id);

		$activeLang = Language :: where('like_default_for_admin', 1) -> first();

		$varWord = 'word_'.$activeLang -> title;


		$pagesForSelect[0] = '-- '.Bsw :: where('system_word', 'a_select') -> first() -> $varWord.' --';

		$pagesForIncludeInPages = array();

		foreach(Page :: where('published', 1) -> get() as $data) {
			$pagesForSelect[$data['id']] = $data['alias_'.$activeLang -> title];
			
			$pagesForIncludeInPages[$data['id']]['alias'] = $data['alias_'.$activeLang -> title];
			// $pagesForIncludeInPages[$data['id']]['checked'] = ModulesIncludesValue :: where('module', $module -> id) -> delete();;
		}


		$prevId = 0;
		$nextId = 0;

		$prevIdIsSaved = false;
		$nextIdIsSaved = false;

		foreach(Module :: all() -> sortBy('alias') as $data) {
			if($nextIdIsSaved && !$nextId) {
				$nextId = $data -> id;
			}
			
			if($module -> id === $data -> id) {
				$prevIdIsSaved = true;
				$nextIdIsSaved = true;
			}
			
			if(!$prevIdIsSaved) {
				$prevId = $data -> id;
			}
		}


		return view('modules.modules.admin_panel.edit_step_0', ['modules' => Module :: all(),
																'pagesForSelect' => $pagesForSelect,
																'pagesForIncludeInPages' => $pagesForIncludeInPages,
																'pages' => Page :: where('published', 1) -> get(),
																'languages' => Language :: where('published', 1) -> get(),
																'module' => $module,
																'moduleSteps' => ModuleStep :: where('top_level', $module -> id) -> get(),
																'prevModuleId' => $prevId,
																'nextModuleId' => $nextId]);
	}


	public function update(Request $request, $id) {
		$module = Module :: find($id);
		$module -> alias = (!is_null($request -> input('alias')) ? $request -> input('alias') : '');
		$module -> title = (!is_null($request -> input('title')) ? $request -> input('title') : '');
		$module -> page = $request -> input('page');
		$module -> icon_bg_color = (!is_null($request -> input('icon_bg_color')) ? $request -> input('icon_bg_color') : '');
		$module -> hide_for_admin = (!is_null($request -> input('hide_for_admin')) ? $request -> input('hide_for_admin') : 0);
		$module -> include_type = (!is_null($request -> input('include_type')) ? $request -> input('include_type') : 0);

		$module -> save();


		ModulesIncludesValue :: where('module', $module -> id) -> delete();


		foreach(Page :: where('published', 1) -> get() as $data) {
			if(!is_null($request -> input('page_include_'.$data -> id))) {
				$modulesIncludesValue = new ModulesIncludesValue;
				$modulesIncludesValue -> module = $module -> id;
				$modulesIncludesValue -> include_in = $data -> id;
				$modulesIncludesValue -> save();
			}
		}

		if($request -> file('svg_icon')) {
			$filePath = $request -> file('svg_icon') -> storeAs('images/modules/modules',
																$module -> id.'_icon.svg',
																'public');
		}


		return redirect() -> route('moduleEdit', $module -> id);
	}
	

	public function delete($id) {
		Module :: destroy($id);

		return redirect() -> route('moduleStartPoint');
	}
}
