<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\ModuleLevel;
use App\Models\ModuleStep;
use App\Models\ModuleBlock;
use App\Models\Page;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AModuleStepUpdateRequest;
use Session;


class AModuleStepController extends AController {
	public function add($moduleId, $levelId) {
		$moduleLevel = ModuleLevel::find($levelId);

		$data = array_merge(self::getDefaultData(), ['moduleLevel' => $moduleLevel]);

		return view('modules.modules.admin_panel.add_step_2', $data);
	}


	public function insert(AModuleStepUpdateRequest $request, $moduleId, $moduleLevelId) {
		// $modulheLevel = ModuleLevel::find($moduleLevelId);


		$moduleStep = new ModuleStep();

		$moduleStep->top_level = $moduleLevelId;
		$moduleStep->title = $request->input('title');
		$moduleStep->db_table = $request->input('db_table');
		$moduleStep->images = $request->has('images');
		$moduleStep->possibility_to_add = $request->has('possibility_to_add');
		$moduleStep->possibility_to_delete = $request->has('possibility_to_delete');
		$moduleStep->possibility_to_rang = $request->has('possibility_to_rang');
		$moduleStep->possibility_to_edit = $request->has('possibility_to_edit');
		$moduleStep->use_existing_step = $request->has('use_existing_step');
		$moduleStep->blocks_max_number = $request->has('blocks_max_number');

		$moduleStep->save();

		
		$request->session()->flash('successStatus', __('bsw.successStatus')); // Status for success.

		// dd($moduleStep);

		return redirect()->route('moduleStepEdit', [
														$moduleStep->moduleLevel->module->id,
														$moduleStep->moduleLevel->id,
														$moduleStep->id
													]);
	}


	public function edit($moduleId, $levelId, $id) {
		ModuleBlock::deleteEmpty();

		$moduleStep = ModuleStep::find($id);


		$prevId = 0;
		$nextId = 0;

		$prevIdIsSaved = false;
		$nextIdIsSaved = false;

		// dd($id);

		foreach($moduleStep->moduleLevel->moduleStep as $data) {
			if($nextIdIsSaved && !$nextId) {
				$nextId = $data->id;
			}
			
			if($moduleStep->id === $data->id) {
				$prevIdIsSaved = true;
				$nextIdIsSaved = true;
			}
			
			if(!$prevIdIsSaved) {
				$prevId = $data->id;
			}
		}

		// dd(ModuleStep::find($prevId));

		$data = array_merge(self::getDefaultData(), [
														'pages' => Page::all(),
														'languages' => Language::where('disable', 1)->get(),
														'moduleStep' => $moduleStep,
														'prev' => $prevId,
														'next' => $nextId
													]);


		return view('modules.modules.admin_panel.edit_step_2', $data);
	}


	public function update(AModuleStepUpdateRequest $request, $moduleId, $id) {
		$moduleStep = ModuleStep::find($id);

		$moduleStep->title = $request->input('title');
		$moduleStep->db_table = $request->input('db_table');
		$moduleStep->images = $request->has('images');
		$moduleStep->possibility_to_add = $request->has('possibility_to_add');
		$moduleStep->possibility_to_delete = $request->has('possibility_to_delete');
		$moduleStep->possibility_to_rang = $request->has('possibility_to_rang');
		$moduleStep->possibility_to_edit = $request->has('possibility_to_edit');
		$moduleStep->use_existing_step = $request->has('use_existing_step');
		$moduleStep->blocks_max_number = $request->has('blocks_max_number');

		$moduleStep->save();

		
		$request->session()->flash('successStatus', __('bsw.successStatus')); // Status for success.

		return redirect()->route('moduleStepEdit', array($moduleStep->module->id, $moduleStep->id));
	}
	

	public function delete($moduleId, $moduleLevelId, $id) {
		ModuleStep::destroy($id);

		Session::flash('successDeleteStatus', __('bsw.deleteSuccessStatus'));

		return redirect()->route('moduleLevelEdit', [
														$moduleId,
														$moduleLevelId
													]);
	}
}
