<?php

namespace App\Http\Controllers;

use App\Module;
use App\ModuleStep;
use App\ModuleBlock;
use App\Language;
use App\Bsc;
use App\Bsw;
use Illuminate\Http\Request;
use DB;


class AdminController extends Controller {
	public function getDefaultPage() {
		$firstModul = Module :: orderBy('rang','desc') -> first();
		$firstModulTitle = $firstModul -> alias;
		return redirect("/admin/$firstModulTitle");
		// return $firstModul -> alias;
	}


    public function getModulePage($moduleAlias) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> first();
		$moduleBlock = ModuleBlock :: where('top_level', $moduleStep -> id) -> where('a_use_for_tags', 1) -> first();

		$use_for_tags = 'id';

		if($moduleBlock) {
			$use_for_tags = $moduleBlock -> db_column;
		}


		$moduleBlockForSort = ModuleBlock :: where('top_level', $moduleStep -> id) -> where('a_use_for_sort', 1) -> first();

		$use_for_sort = 'id';
		$sort_by = 'DESC';

		if($moduleBlockForSort) {
			$use_for_sort = $moduleBlockForSort -> db_column;

			if(!$moduleBlockForSort -> sort_by_desc) {
				$sort_by = 'ASC';
			}
		}


		return view('modules.core.step0', ['modules' => Module :: all(),
											'module' => $module,
											'moduleStep' => $moduleStep,
											'moduleSteps' => ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> get(),
											'moduleStepData' => DB :: table($moduleStep -> db_table) -> orderBy($use_for_sort, $sort_by) -> get(),
											'use_for_tags' => $use_for_tags,
											'bsc' => Bsc :: getFullData(),
											'bsw' => Bsw :: getFullData(Language :: where('like_default_for_admin', 1) -> first() -> title)]);
	}


	public function addModulePage($moduleAlias) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> first();

		$newRowId = DB :: table($moduleStep -> db_table) -> insertGetId(array());

		return redirect() -> route('moduleDataEdit', array($module -> alias, $newRowId));
	}


	public function editModulePage($moduleAlias, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> first();
		$moduleBlocks = ModuleBlock :: where('top_level', $moduleStep -> id) -> orderBy('rang', 'desc') -> get();
		$pageData = DB :: table($moduleStep -> db_table) -> find($id);

		$moduleBlock = ModuleBlock :: where('top_level', $moduleStep -> id) -> where('a_use_for_tags', 1) -> first();

		$use_for_tags = 'id';

		if($moduleBlock) {
			$use_for_tags = $moduleBlock -> db_column;
		}


		$prevId = 0;
		$nextId = 0;

		$prevIdIsSaved = false;
		$nextIdIsSaved = false;

		foreach(DB :: table($moduleStep -> db_table) -> orderBy('id') -> get() as $data) {
			if($nextIdIsSaved && !$nextId) {
				$nextId = $data -> id;
			}
			
			if($pageData -> id === $data -> id) {
				$prevIdIsSaved = true;
				$nextIdIsSaved = true;
			}
			
			if(!$prevIdIsSaved) {
				$prevId = $data -> id;
			}
		}

		
		return view('modules.core.step1', ['modules' => Module :: all(),
											'module' => $module,
											'moduleStep' => $moduleStep,
											'moduleBlocks' => $moduleBlocks,
											'languages' => Language :: where('published', 1) -> get(),
											'data' => $pageData,
											'prevId' => $prevId,
											'nextId' => $nextId,
											'use_for_tags' => $use_for_tags,
											'bsc' => Bsc :: getFullData(),
											'bsw' => Bsw :: getFullData(Language :: where('like_default_for_admin', 1) -> first() -> title)]);
	}


	public function updateModulePage(Request $request, $moduleAlias, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> first();
		$moduleBlocks = ModuleBlock :: where('top_level', $moduleStep -> id) -> orderBy('rang', 'desc') -> get();

		$updateQuery = [];

		foreach($moduleBlocks as $data) {
			if($data -> type !== 'published' && $data -> type !== 'rang') {
				$updateQuery[$data -> db_column] = (!is_null($request -> input($data -> db_column)) ? $request -> input($data -> db_column) : '');
			}
		}

		DB :: table($moduleStep -> db_table) -> where('id', $id) -> update($updateQuery);

		return redirect() -> route('moduleDataEdit', array($module -> alias, $id));
	}


	public function deleteModulePage($moduleAlias, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> first();

		DB :: table($moduleStep -> db_table) -> delete($id);

		return redirect() -> route('moduleGetData', $module -> alias);
	}
}
