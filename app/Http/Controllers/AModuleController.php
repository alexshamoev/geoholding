<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\ModuleStep;
use App\Models\ModuleBlock;
use App\Models\Page;
use App\Models\Language;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\ModulesIncludesValue;
use App\Models\ModulesNotIncludesValue;
use App\ADefaultData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AModuleController extends Controller {
    public function getStartPoint() {
		$defaultData = ADefaultData :: get();

		return view('modules.modules.admin_panel.start_point', $defaultData);
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
		$pagesNotIncludeInPages = array();

		foreach(Page :: where('published', 1) -> get() as $data) {
			$pagesForSelect[$data['id']] = $data['alias_'.$activeLang -> title];
			
			$pagesForIncludeInPages[$data['id']]['alias'] = $data['alias_'.$activeLang -> title];
			$pagesNotIncludeInPages[$data['id']]['alias'] = $data['alias_'.$activeLang -> title];

			$checkedForIncludeOption = ModulesIncludesValue :: where([['module', $id], ['include_in', $data['id']]]) -> first();
			$checkedNotIncludesOption = ModulesNotIncludesValue :: where([['module', $id], ['include_in', $data['id']]]) -> first();

			if($checkedForIncludeOption) {
				$pagesForIncludeInPages[$data['id']]['checked'] = 'checked';
			} else {
				$pagesForIncludeInPages[$data['id']]['checked'] = '';
			}
			
			if($checkedNotIncludesOption) {
				$pagesNotIncludeInPages[$data['id']]['checked'] = 'checked';
			} else {
				$pagesNotIncludeInPages[$data['id']]['checked'] = '';
			}
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

		$defaultData = ADefaultData :: get();

		$data = array_merge($defaultData, ['pagesForSelect' => $pagesForSelect,
											'pagesForIncludeInPages' => $pagesForIncludeInPages,
											'pagesNotIncludeInPages' => $pagesNotIncludeInPages,
											'pages' => Page :: where('published', 1) -> get(),
											'languages' => Language :: where('published', 1) -> get(),
											'module' => $module,
											'moduleSteps' => ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> get(),
											'prevModuleId' => $prevId,
											'nextModuleId' => $nextId]);

		return view('modules.modules.admin_panel.edit_step_0', $data);
	}


	public function update(Request $request, $id) {
		$module = Module :: find($id);


		// Validation
			$validator = Validator :: make($request -> all(), array(
				'alias' => 'required|min:2|max:100',
				'title' => 'required|min:2|max:100',
				'icon_bg_color' => 'required|min:3|max:20'
			));

			if($validator -> fails()) {
				return redirect() -> route('moduleEdit', $module -> id) -> withErrors($validator) -> withInput();
			}
		//


		$module -> alias = $request -> input('alias');
		$module -> title = $request -> input('title');
		$module -> page = $request -> input('page');
		$module -> icon_bg_color = (!is_null($request -> input('icon_bg_color')) ? $request -> input('icon_bg_color') : '');
		$module -> hide_for_admin = (!is_null($request -> input('hide_for_admin')) ? $request -> input('hide_for_admin') : 0);
		$module -> include_type = (!is_null($request -> input('include_type')) ? $request -> input('include_type') : 0);

		$module -> save();


		ModulesIncludesValue :: where('module', $module -> id) -> delete();
		ModulesNotIncludesValue :: where('module', $module -> id) -> delete();


		foreach(Page :: where('published', 1) -> get() as $data) {
			if(!is_null($request -> input('page_include_'.$data -> id))) {
				$modulesIncludesValue = new ModulesIncludesValue;
				$modulesIncludesValue -> module = $module -> id;
				$modulesIncludesValue -> include_in = $data -> id;
				$modulesIncludesValue -> save();
			}

			if(!is_null($request -> input('page_not_include_'.$data -> id))) {
				$modulesNotIncludesValue = new ModulesNotIncludesValue;
				$modulesNotIncludesValue -> module = $module -> id;
				$modulesNotIncludesValue -> include_in = $data -> id;
				$modulesNotIncludesValue -> save();
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
