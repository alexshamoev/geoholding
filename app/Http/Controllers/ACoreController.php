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

class ACoreController extends Controller {
    public function getStep0($moduleAlias) {
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

		$defaultData = ADefaultData :: get();

		$data = array_merge($defaultData, ['module' => $module,
											'moduleStep' => $moduleStep,
											'moduleSteps' => ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> get(),
											'moduleStepData' => DB :: table($moduleStep -> db_table) -> orderBy($use_for_sort, $sort_by) -> get(),
											'sortBy' => $use_for_sort,
											'use_for_tags' => $use_for_tags]);

		return view('modules.core.step0', $data);
	}


	public function addStep0($moduleAlias) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> first();

		$newRowId = DB :: table($moduleStep -> db_table) -> insertGetId(array());

		return redirect() -> route('coreEditStep0', array($module -> alias, $newRowId));
	}


	public function editStep0($moduleAlias, $id) {
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

		
		$activeLang = Language :: where('like_default_for_admin', 1) -> first();

		$varWord = 'word_'.$activeLang -> title;

		
		$selectData = [];
		$selectOptgroudData = [];

		foreach(ModuleBlock :: where('top_level', $moduleStep -> id) -> orderBy('rang', 'desc') -> get() as $data) {
			if($data -> type === 'select') {
				$selectData[$data -> db_column][0] = '-- '.Bsw :: where('system_word', 'a_select') -> first() -> $varWord.' --';

				$tempVar = $data -> select_option_text;
				$sort_by_this = $data -> select_sort_by_text;

				foreach(DB :: table($data -> select_table) -> orderBy($data -> select_sort_by, $sort_by_this) -> get() as $dataInside) {
					$selectData[$data -> db_column][$dataInside -> id] = $dataInside -> $tempVar;
				}
			}
			
			if($data -> type === 'select_with_optgroup') {
				$selectOptgroudData[$data -> db_column][0] = '-- '.Bsw :: where('system_word', 'a_select') -> first() -> $varWord.' --';

				$tempVar = $data -> select_optgroup_text;
				
				// $sort_by_this = $data -> select_sort_by_text;

				// $selectOptgroudData[$data -> db_column] = array('Cats' => array('45' => 'Leopard','124' => 'Lion'),
				// 												'tiger' => array('12' => 'Grizzle'),
				// 													'Dogs' => array('54' => 'Spaniel'),
				// 																);

				foreach(DB :: table($data -> select_optgroup_table) -> orderBy($data -> select_optgroup_sort_by, 'desc') -> get() as $dataInside) {
					// $selectOptgroudData[$data -> db_column][$dataInside -> id] = $dataInside -> $tempVar;
					$tempVarSecond = $data -> select_optgroup_2_text;

					// $banks = Bank::pluck('name', 'id'); 

					foreach(DB :: table($data -> select_optgroup_2_table) -> orderBy($data -> select_optgroup_2_sort_by, 'desc') -> get() as $dataInsideTwice) {
						$selectOptgroudData[$data -> db_column] = array($dataInside -> $tempVar => array($dataInside -> id => $dataInsideTwice -> $tempVarSecond,'124' => 'Lion'),
																		'tiger' => array('12' => 'Grizzle'),
																		'Dogs' => array('54' => 'Spaniel'));
					}
				}
			}
		}

		// <!-- Form:: -->

		$defaultData = ADefaultData :: get();

		$data = array_merge($defaultData, ['module' => $module,
											'moduleStep' => $moduleStep,
											'moduleBlocks' => $moduleBlocks,
											'selectData' => $selectData,
											'selectOptgroudData' => $selectOptgroudData,
											'languages' => Language :: where('published', 1) -> get(),
											'data' => $pageData,
											'prevId' => $prevId,
											'nextId' => $nextId,
											'use_for_tags' => $use_for_tags]);

		return view('modules.core.step1', $data);
	}


	public function updateStep0(Request $request, $moduleAlias, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> first();
		$moduleBlocks = ModuleBlock :: where('top_level', $moduleStep -> id) -> orderBy('rang', 'desc') -> get();

		$updateQuery = [];

		foreach($moduleBlocks as $data) {
			if($data -> type !== 'published' && $data -> type !== 'rang' && $data -> type !== 'alias') {
				$updateQuery[$data -> db_column] = (!is_null($request -> input($data -> db_column)) ? $request -> input($data -> db_column) : '');
			}

			if($data -> type === 'alias') {
				$value = $request -> input($data -> db_column);
				$value = preg_replace("/[^A-ZА-Яა-ჰ0-9 -]+/ui",
										'',
										$value);

				$value = strtolower(trim($value));
				$value = mb_strtolower($value);

				$symbols = array('     ', '    ', '   ', '  ', ' ', '.', ',', '!', '?', '=', '#', '%', '+', '*', '/', '_', '\'', '"');

				$replace_symbols = array('-', '-', '-', '-', '-', '-', '-', '', '-', '-', '', '', '-', '', '-', '-', '', '');

				$value = str_replace($symbols,
										$replace_symbols,
										$value);
										
				$updateQuery[$data -> db_column] = $value;
			}
		}

		DB :: table($moduleStep -> db_table) -> where('id', $id) -> update($updateQuery);

		return redirect() -> route('coreEditStep0', array($module -> alias, $id));
	}


	public function deleteStep0($moduleAlias, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> first();

		DB :: table($moduleStep -> db_table) -> delete($id);

		return redirect() -> route('coreGetStep0', $module -> alias);
	}
}
