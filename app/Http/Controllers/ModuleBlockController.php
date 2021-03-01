<?php

namespace App\Http\Controllers;

use App\Module;
use App\ModuleStep;
use App\ModuleBlock;
use App\Page;
use App\Language;
use Illuminate\Http\Request;

class ModuleBlockController extends Controller {
	public function add($moduleId, $stepId) {
		$module = Module :: find($moduleId);
		$moduleStep = ModuleStep :: find($stepId);

		$moduleBlock = new ModuleBlock();

		$moduleBlock -> top_level = $moduleStep -> id;

		$moduleBlock -> save();


		return redirect() -> route('moduleBlockEdit', array($module -> id, $moduleStep -> id, $moduleBlock -> id));
	}


	public function edit($moduleId, $stepId, $id) {
		$module = Module :: find($moduleId);
		$moduleStep = ModuleStep :: find($stepId);
		$moduleBlock = ModuleBlock :: find($id);


		$prevId = 0;
		$nextId = 0;

		$prevIdIsSaved = false;
		$nextIdIsSaved = false;

		foreach(ModuleBlock :: where('top_level', $moduleStep -> id) -> orderBy('rang') -> get() as $data) {
			if($nextIdIsSaved && !$nextId) {
				$nextId = $data -> id;
			}
			
			if($moduleBlock -> id === $data -> id) {
				$prevIdIsSaved = true;
				$nextIdIsSaved = true;
			}
			
			if(!$prevIdIsSaved) {
				$prevId = $data -> id;
			}
		}


		return view('modules.modules.admin_panel.edit_step_2', ['modules' => Module :: all(),
																'pages' => Page :: where('published', 1) -> get(),
																'languages' => Language :: where('published', 1) -> get(),
																'module' => $module,
																'moduleSteps' => ModuleStep :: where('top_level', $module -> id) -> get(),
																'moduleBlocks' => ModuleBlock :: where('top_level', $moduleStep -> id) -> get(),
																'moduleStep' => $moduleStep,
																'moduleBlock' => $moduleBlock,
																'prev' => ModuleBlock :: find($prevId),
																'next' => ModuleBlock :: find($nextId)]);
	}


	public function update(Request $request, $moduleId, $stepId, $id) {
		$module = Module :: find($moduleId);
		$moduleStep = ModuleStep :: find($stepId);
		$moduleBlock = ModuleBlock :: find($id);

		$moduleBlock -> db_column = (!is_null($request -> input('db_column')) ? $request -> input('db_column') : '');
		$moduleBlock -> label = (!is_null($request -> input('label')) ? $request -> input('label') : '');
		$moduleBlock -> example = (!is_null($request -> input('example')) ? $request -> input('example') : '');
		$moduleBlock -> check_in_delete_empty = (!is_null($request -> input('check_in_delete_empty')) ? $request -> input('check_in_delete_empty') : 0);

		$moduleBlock -> save();

		return redirect() -> route('moduleBlockEdit', array($module -> id, $moduleStep -> id, $moduleBlock -> id));
	}
	

	public function delete($moduleId, $stepId, $id) {
		ModuleBlock :: destroy($id);

		return redirect() -> route('moduleStepEdit', array($moduleId, $stepId));
	}
}
