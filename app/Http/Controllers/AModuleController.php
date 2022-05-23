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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AModuleUpdateRequest;
use Session;


class AModuleController extends AController {
    public function getStartPoint() {
		return view('modules.modules.admin_panel.start_point', self :: getDefaultData());
	}
	

	public function add() {
		$activeLang = Language :: where('like_default_for_admin', 1) -> first();

		$pagesForSelect[0] = '-- '.__('bsw.select').' --';

		$pagesForIncludeInPages = array();
		$pagesNotIncludeInPages = array();

		foreach(Page :: all() as $data) {
			$pagesForSelect[$data['id']] = $data['alias_'.$activeLang -> title];
			
			$pagesForIncludeInPages[$data['id']]['alias'] = $data['alias_'.$activeLang -> title];
			$pagesNotIncludeInPages[$data['id']]['alias'] = $data['alias_'.$activeLang -> title];

			$pagesForIncludeInPages[$data['id']]['checked'] = '';
			$pagesNotIncludeInPages[$data['id']]['checked'] = '';
		}


		$data = array_merge(self :: getDefaultData(), ['pagesForSelect' => $pagesForSelect,
														'pagesForIncludeInPages' => $pagesForIncludeInPages,
														'pagesNotIncludeInPages' => $pagesNotIncludeInPages,
														'pages' => Page :: all(),
														'languages' => Language :: where('disable', 1) -> get()]);

		return view('modules.modules.admin_panel.add_step_0', $data);
	}


	public function insert(AModuleUpdateRequest $request) {
		$module = new Module();

		$module -> alias = $request -> input('alias');
		$module -> title = $request -> input('title');
		$module -> icon_bg_color = (!is_null($request -> input('icon_bg_color')) ? $request -> input('icon_bg_color') : '');
		$module -> hide_for_admin = (!is_null($request -> input('hide_for_admin')) ? $request -> input('hide_for_admin') : 0);
		$module -> include_type = (!is_null($request -> input('include_type')) ? $request -> input('include_type') : 0);

		if($module -> include_type != 0) {
			$module -> page_id = 0;
		} else {
			$module -> page_id = $request -> input('page_id');
		}
		
		$module -> save();


		ModulesIncludesValue :: where('module', $module -> id) -> delete();
		ModulesNotIncludesValue :: where('module', $module -> id) -> delete();


		foreach(Page :: all() as $data) {
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
		

		$request -> session() -> flash('successStatus', __('bsw.successStatus')); // Status for success.

		return redirect() -> route('moduleEdit', $module -> id);
	}


	public function edit($id) {
		ModuleStep :: deleteEmpty();

		
		$module = Module :: find($id);

		$activeLang = Language :: where('like_default_for_admin', 1) -> first();

		$pagesForSelect[0] = '-- '.__('bsw.select').' --';

		$pagesForIncludeInPages = array();
		$pagesNotIncludeInPages = array();

		foreach(Page :: all() as $data) {
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

		foreach(Module :: all() -> sortByDesc('rang') as $data) {
			// if($data -> moduleSteps) {
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
			// }
		}

		ModuleBlock :: deleteEmpty();
		ModuleStep :: deleteEmpty();

		$data = array_merge(self :: getDefaultData(), ['pagesForSelect' => $pagesForSelect,
														'pagesForIncludeInPages' => $pagesForIncludeInPages,
														'pagesNotIncludeInPages' => $pagesNotIncludeInPages,
														'pages' => Page :: all(),
														'languages' => Language :: where('disable', 1) -> get(),
														'module' => $module,
														'prevModuleId' => $prevId,
														'nextModuleId' => $nextId]);

		return view('modules.modules.admin_panel.edit_step_0', $data);
	}


	public function update(AModuleUpdateRequest $request, $id) {
		$module = Module :: find($id);

		$module -> alias = $request -> input('alias');
		$module -> title = $request -> input('title');
		$module -> page_id = $request -> input('page_id');
		$module -> icon_bg_color = (!is_null($request -> input('icon_bg_color')) ? $request -> input('icon_bg_color') : '');
		$module -> hide_for_admin = (!is_null($request -> input('hide_for_admin')) ? $request -> input('hide_for_admin') : 0);
		$module -> include_type = (!is_null($request -> input('include_type')) ? $request -> input('include_type') : 0);

		if($module -> include_type != 0) {
			$module -> page_id = 0;
		}

		$module -> save();


		ModulesIncludesValue :: where('module', $module -> id) -> delete();
		ModulesNotIncludesValue :: where('module', $module -> id) -> delete();


		foreach(Page :: all() as $data) {
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
		

		$request -> session() -> flash('successStatus', __('bsw.successStatus')); // Status for success.

		return redirect() -> route('moduleEdit', $module -> id);
	}
	

	public function delete($id) {
		Module :: destroy($id);

		Session :: flash('successStatus', __('bsw.deleteSuccessStatus'));

		return redirect() -> route('moduleStartPoint');
	}
}
