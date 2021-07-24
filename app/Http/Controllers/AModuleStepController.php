<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\ModuleStep;
use App\Models\ModuleBlock;
use App\Models\Page;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\Language;
use App\ADefaultData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AModuleStepController extends Controller {
	public function add($moduleId) {
		$module = Module :: find($moduleId);

		$moduleStep = new ModuleStep();

		$moduleStep -> top_level = $module -> id;

		$moduleStep -> save();


		return redirect() -> route('moduleStepEdit', array($module -> id, $moduleStep -> id));
	}


	public function edit($moduleId, $id) {
		$module = Module :: find($moduleId);
		$moduleStep = ModuleStep :: find($id);


		$prevId = 0;
		$nextId = 0;

		$prevIdIsSaved = false;
		$nextIdIsSaved = false;

		foreach(ModuleStep :: where('top_level', $module -> id) -> orderBy('rang') -> get() as $data) {
			if($nextIdIsSaved && !$nextId) {
				$nextId = $data -> id;
			}
			
			if($moduleStep -> id === $data -> id) {
				$prevIdIsSaved = true;
				$nextIdIsSaved = true;
			}
			
			if(!$prevIdIsSaved) {
				$prevId = $data -> id;
			}
		}


		$defaultData = ADefaultData :: get();

		$data = array_merge($defaultData, ['pages' => Page :: where('published', 1) -> get(),
											'languages' => Language :: where('published', 1) -> get(),
											'module' => $module,
											'moduleSteps' => ModuleStep :: where('top_level', $module -> id) -> get(),
											'moduleBlocks' => ModuleBlock :: where('top_level', $moduleStep -> id) -> orderBy('rang', 'desc') -> get(),
											'moduleStep' => $moduleStep,
											'prev' => ModuleStep :: find($prevId),
											'next' => ModuleStep :: find($nextId)]);


		return view('modules.modules.admin_panel.edit_step_1', $data);
	}


	public function update(Request $request, $moduleId, $id) {
		$module = Module :: find($moduleId);

		$moduleStep = ModuleStep :: find($id);


		// Validation
			$validator = Validator :: make($request -> all(), array(
				'title' => 'required|min:2|max:100',
				'db_table' => 'required|min:2|max:100'
			));

			if($validator -> fails()) {
				return redirect() -> route('moduleStepEdit', array($module -> id, $moduleStep -> id)) -> withErrors($validator) -> withInput();
			}
		//


		$moduleStep -> title = (!is_null($request -> input('title')) ? $request -> input('title') : '');
		$moduleStep -> db_table = (!is_null($request -> input('db_table')) ? $request -> input('db_table') : '');
		$moduleStep -> images = (!is_null($request -> input('images')) ? $request -> input('images') : 0);
		$moduleStep -> possibility_to_add = (!is_null($request -> input('possibility_to_add')) ? $request -> input('possibility_to_add') : 0);
		$moduleStep -> possibility_to_delete = (!is_null($request -> input('possibility_to_delete')) ? $request -> input('possibility_to_delete') : 0);
		$moduleStep -> possibility_to_rang = (!is_null($request -> input('possibility_to_rang')) ? $request -> input('possibility_to_rang') : 0);
		$moduleStep -> possibility_to_edit = (!is_null($request -> input('possibility_to_edit')) ? $request -> input('possibility_to_edit') : 0);
		$moduleStep -> use_existing_step = (!is_null($request -> input('use_existing_step')) ? $request -> input('use_existing_step') : 0);
		$moduleStep -> blocks_max_number = (!is_null($request -> input('blocks_max_number')) ? $request -> input('blocks_max_number') : 0);

		$moduleStep -> save();

		return redirect() -> route('moduleStepEdit', array($module -> id, $moduleStep -> id));
	}
	

	public function delete($moduleId, $id) {
		ModuleStep :: destroy($id);

		return redirect() -> route('moduleEdit', $moduleId);
	}
}
