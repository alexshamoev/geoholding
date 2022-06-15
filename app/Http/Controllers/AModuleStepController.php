<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\ModuleStep;
use App\Models\Page;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AModuleStepUpdateRequest;
use Session;


class AModuleStepController extends AController {
	public function add($moduleId) {
		$module = Module::find($moduleId);

		$topLevelSelectValues['Without parent'] = [0 => '-- Without parent --'];

		foreach(Module::orderBy('rang', 'DESC')->get() as $moduleData) {
			$topLevelSelectValues[$moduleData->title] = [];

			foreach($moduleData->moduleStep as $stepData) {
				$topLevelSelectValues[$moduleData->title][$stepData->id] = $stepData->db_table;
			}
		}

		$data = array_merge(self::getDefaultData(), [
														'module' => $module,
														'topLevelSelectValues' => $topLevelSelectValues
													]);

		return view('modules.modules.admin_panel.add_step_2', $data);
	}


	public function insert(AModuleStepUpdateRequest $request, $moduleId) {
		$moduleStep = new ModuleStep();

		$moduleStep->top_level = $moduleId;
		$moduleStep->parent_step_id = $request->input('parent_step_id');
		$moduleStep->title = $request->input('title');
		$moduleStep->db_table = $request->input('db_table');
		$moduleStep->main_column = $request->input('main_column');
		$moduleStep->images = $request->has('images');
		$moduleStep->possibility_to_add = $request->has('possibility_to_add');
		$moduleStep->possibility_to_delete = $request->has('possibility_to_delete');
		$moduleStep->possibility_to_rang = $request->has('possibility_to_rang');
		$moduleStep->possibility_to_edit = $request->has('possibility_to_edit');
		$moduleStep->blocks_max_number = $request->has('blocks_max_number');
		$moduleStep->order_by_column = $request->input('order_by_column');
		$moduleStep->order_by_sequence = $request->input('order_by_sequence');

		$moduleStep->save();
		
		$request->session()->flash('successStatus', __('bsw.successStatus')); // Status for success.

		return redirect()->route('moduleStepEdit', [
														$moduleStep->module->id,
														$moduleStep->id
													]);
	}


	public function edit($moduleId, $id) {
		$moduleStep = ModuleStep::find($id);


		$prevId = 0;
		$nextId = 0;

		$prevIdIsSaved = false;
		$nextIdIsSaved = false;

		foreach($moduleStep->module->moduleStep as $data) {
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

		$topLevelSelectValues['Without parent'] = [0 => '-- Without parent --'];

		foreach(Module::with(['moduleStep:id,db_table'])->get()->sortByDesc('rang') as $moduleData) {
			$topLevelSelectValues[$moduleData->title] = [];

			foreach($moduleData->moduleStep as $stepData) {
				$topLevelSelectValues[$moduleData->title][$stepData->id] = $stepData->db_table;
			}
		}

		$data = array_merge(self::getDefaultData(), [
														'pages' => Page::all(),
														'languages' => Language::where('disable', 1)->get(),
														'moduleStep' => $moduleStep,
														'prev' => $prevId,
														'next' => $nextId,
														'topLevelSelectValues' => $topLevelSelectValues
													]);


		return view('modules.modules.admin_panel.edit_step_2', $data);
	}


	public function update(AModuleStepUpdateRequest $request, $moduleId, $id) {
		$moduleStep = ModuleStep::find($id);
		
		$moduleStep->parent_step_id = $request->input('parent_step_id');
		$moduleStep->title = $request->input('title');
		$moduleStep->db_table = $request->input('db_table');
		$moduleStep->main_column = $request->input('main_column');
		$moduleStep->images = $request->has('images');
		$moduleStep->possibility_to_add = $request->has('possibility_to_add');
		$moduleStep->possibility_to_delete = $request->has('possibility_to_delete');
		$moduleStep->possibility_to_rang = $request->has('possibility_to_rang');
		$moduleStep->possibility_to_edit = $request->has('possibility_to_edit');
		$moduleStep->blocks_max_number = $request->has('blocks_max_number');
		$moduleStep->order_by_column = $request->input('order_by_column');
		$moduleStep->order_by_sequence = $request->input('order_by_sequence');

		$moduleStep->save();
		
		$request->session()->flash('successStatus', __('bsw.successStatus')); // Status for success.

		return redirect()->route('moduleStepEdit', array($moduleStep->module->id, $moduleStep->id));
	}
	

	public function delete($moduleId, $id) {
		ModuleStep::destroy($id);

		Session::flash('successDeleteStatus', __('bsw.deleteSuccessStatus'));

		return redirect()->route('moduleEdit', [
													$moduleId
												]);
	}
}
