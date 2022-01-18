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
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic;
use DB;


class ACoreControllerStep0 extends Controller {
    public function get($moduleAlias) {
		self :: deleteEmpty();


		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> first();
		$moduleBlock = ModuleBlock :: where('top_level', $moduleStep -> id) -> where('a_use_for_tags', 1) -> first();


		$activeLang = Language :: where('like_default_for_admin', 1) -> first();
		
		
		$use_for_tags = 'id';
		
		if($moduleBlock) {
			$use_for_tags = $moduleBlock -> db_column;
			
			if($moduleBlock -> type === 'alias' || $moduleBlock -> type === 'input_with_languages' || $moduleBlock -> type === 'editor_with_languages') {
				$use_for_tags .= '_'.$activeLang -> title;
			}
		}
		
		
		$moduleBlockForSort = ModuleBlock :: where('top_level', $moduleStep -> id) -> where('a_use_for_sort', 1) -> first();
		
		$orderBy = 'id';
		$sortBy = 'asc';

		if($moduleBlockForSort) {
			$orderBy = $moduleBlockForSort -> db_column;

			if($moduleBlockForSort -> type === 'alias' || $moduleBlockForSort -> type === 'input_with_languages' || $moduleBlockForSort -> type === 'editor_with_languages') {
				$orderBy .= '_'.$activeLang -> title;
			}

			if($moduleBlockForSort -> sort_by_desc) {
				$sortBy = 'desc';
			}
		}


		$imageFormat = 'jpg';

		$moduleBlockForImage = ModuleBlock :: where('top_level', $moduleStep -> id) -> where('type', 'image') -> first();

		if($moduleBlockForImage) {
			$imageFormat = $moduleBlockForImage -> file_format;
		}


		$data = array_merge(ADefaultData :: get(), ['module' => $module,
													'moduleStep' => $moduleStep,
													'moduleSteps' => ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> get(),
													'moduleStepData' => DB :: table($moduleStep -> db_table) -> orderBy($orderBy, $sortBy) -> get(),
													'imageFormat' => $imageFormat,
													'sortBy' => $orderBy,
													'use_for_tags' => $use_for_tags]);

		return view('modules.core.step0', $data);
	}


	public function add($moduleAlias) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> first();

		$newRowId = DB :: table($moduleStep -> db_table) -> insertGetId(array());

		return redirect() -> route('coreEditStep0', array($module -> alias, $newRowId));
	}


	public function edit($moduleAlias, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> first();
		$moduleBlocks = ModuleBlock :: where('top_level', $moduleStep -> id) -> orderBy('rang', 'desc') -> get();
		$pageData = DB :: table($moduleStep -> db_table) -> find($id);

		$moduleBlock = ModuleBlock :: where('top_level', $moduleStep -> id) -> where('a_use_for_tags', 1) -> first();

		$use_for_tags = 'id';

		if($moduleBlock) {
			$use_for_tags = $moduleBlock -> db_column;

			if($moduleBlock -> type === 'alias' || $moduleBlock -> type === 'input_with_languages' || $moduleBlock -> type === 'editor_with_languages') {
				$use_for_tags .= '_ge';
			}
		}


		$activeLang = Language :: where('like_default_for_admin', 1) -> first();


		$prevId = 0;
		$nextId = 0;

		$prevIdIsSaved = false;
		$nextIdIsSaved = false;


		// Data for bar arrows.
			$orderBy = 'id';
			$sortBy = 'asc';
			
			$moduleBlocksForSort = ModuleBlock :: where('top_level', $moduleStep -> id) -> where('a_use_for_sort', 1) -> first();

			if($moduleBlocksForSort) {
				$orderBy = $moduleBlocksForSort -> db_column;

				if($moduleBlocksForSort -> type === 'alias' || $moduleBlocksForSort -> type === 'input_with_languages' || $moduleBlocksForSort -> type === 'editor_with_languages') {
					$orderBy .= '_'.$activeLang -> title;
				}

				if($moduleBlocksForSort -> sort_by_desc) {
					$sortBy = 'desc';
				}
			}


			foreach(DB :: table($moduleStep -> db_table) -> orderBy($orderBy, $sortBy) -> get() as $data) {
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
		//

		
		$selectData = [];
		$selectOptgroudData = [];
		$multCheckboxCatTable = '';

		foreach(ModuleBlock :: where('top_level', $moduleStep -> id) -> orderBy('rang', 'desc') -> get() as $data) {
			// Select
				if($data -> type === 'select') {
					$selectData[$data -> db_column][0] = '-- '.Bsw :: where('system_word', 'a_select') -> first() -> { 'word_'.$activeLang -> title }.' --';

					foreach(DB :: table($data -> select_table) -> orderBy($data -> select_sort_by, $data -> select_sort_by_text) -> get() as $dataInside) {
						$selectData[$data -> db_column][$dataInside -> { $data -> select_search_column }] = $dataInside -> { $data -> select_option_text };
					}
				}
			// 
			
			// Select with optgroups
				if($data -> type === 'select_with_optgroup') {
					$selectOptgroudData[$data -> db_column][0] = '-- '.Bsw :: where('system_word', 'a_select') -> first() -> { 'word_'.$activeLang -> title }.' --';
					$alex = array('-- '.Bsw :: where('system_word', 'a_select') -> first() -> { 'word_'.$activeLang -> title }.' --');

					foreach(DB :: table($data -> select_optgroup_table) -> orderBy($data -> select_optgroup_sort_by, 'desc') -> get() as $dataInside) {
						foreach(DB :: table($data -> select_optgroup_2_table) -> where('parent', $dataInside -> id) -> orderBy($data -> select_optgroup_2_sort_by, 'desc') -> get() as $dataInsideTwice) {
							$alex[$dataInside -> { $data -> select_optgroup_text }][$dataInsideTwice -> id] = $dataInsideTwice -> { $data -> select_optgroup_2_text };
						}
					}

					$selectOptgroudData[$data -> db_column] = $alex;
				}
			// 
			

			// Multiply Checkbox With Category
				$multiplyCheckboxCategory = [];

				if($data -> type === 'multiply_checkboxes_with_category') {
					$checkboxTableText = $data -> sql_select_with_checkboxes_option_text;														
					$checkboxArray = array();

					foreach(DB :: table($data -> sql_select_with_checkboxes_table) -> orderBy($data -> sql_select_with_checkboxes_sort_by, 'desc') -> get() as $dataInside) {
						$checkboxTableTextInside = $data -> sql_select_with_checkboxes_option_text_inside;
						$tempDbColumn = $data -> db_column;
						$tempArray = explode(',', $pageData -> $tempDbColumn);

						foreach(DB :: table($data -> sql_select_with_checkboxes_table_inside) -> where('parent', $dataInside -> id) -> orderBy($data -> sql_select_with_checkboxes_sort_by_inside, 'desc') -> get() as $dataInsideTwice) {
							$active = 0;
							foreach($tempArray as $tempData) {
								if($tempData == $dataInsideTwice -> id) {
									$active = 1;
								}
							}

							$checkboxArray[$dataInside -> $checkboxTableText][$dataInsideTwice -> id] = array('title' => $dataInsideTwice -> $checkboxTableTextInside, 'active' => $active);
						}
					}

					$multiplyCheckboxCategory[$data -> db_column] = $checkboxArray;
				}
			//


			// Multiply Checkbox
				$multiplyCheckbox = [];
				
				if($data -> type === 'multiply_checkboxes') {
					$checkboxText = $data -> sql_select_with_checkboxes_option_text;														
					$checkboxArray = array();
					$active = 0;

					foreach(DB :: table($data -> sql_select_with_checkboxes_table) -> orderBy($data -> sql_select_with_checkboxes_sort_by, 'desc') -> get() as $dataInside) {
						$tempDbColumn = $data -> db_column;
						$tempArray = explode(',', $pageData -> $tempDbColumn);

						foreach($tempArray as $tempData) {
							if($tempData == $dataInside -> id) {
								$active = 1;
							}
						}

						$checkboxArray[$dataInside -> id] = array('title' => $dataInside -> $checkboxText, 'active' => $active);
					}
					
					$multiplyCheckbox[$data -> db_column] = $checkboxArray;
				}
			//
		}

		
		$use_for_sort = 'rang';


		$imageFormat = 'jpg';

		$nextModuleStepData = false;

		$nextModuleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(1) -> take(1) -> first();
		
		if($nextModuleStep) {
			$nextModuleStepData = DB :: table($nextModuleStep -> db_table) -> where('parent', $id) -> orderBy($use_for_sort, 'desc') -> get();

			$moduleBlockForImage = ModuleBlock :: where('top_level', $nextModuleStep -> id) -> where('type', 'image') -> first();

			if($moduleBlockForImage) {
				$imageFormat = $moduleBlockForImage -> file_format;
			}
		}

		$moduleBlockForSort = ModuleBlock :: where('top_level', $module -> id) -> where('a_use_for_sort', 1) -> first();

		$use_for_sort = 'id';
		$sort_by = 'DESC';

		if($moduleBlockForSort) {
			$use_for_sort = $moduleBlockForSort -> db_column;

			if(!$moduleBlockForSort -> sort_by_desc) {
				$sort_by = 'ASC';
			}
		}


		


		$data = array_merge(ADefaultData :: get(), ['module' => $module,
													'moduleStep' => $moduleStep,
													'moduleStepData' => DB :: table($moduleStep -> db_table) -> orderBy($use_for_sort, $sort_by) -> get(),
													'moduleBlocks' => $moduleBlocks,
													'selectData' => $selectData,
													'selectOptgroudData' => $selectOptgroudData,
													'languages' => Language :: where('published', 1) -> orderBy('rang', 'desc') -> get(),
													'sortBy' => $orderBy,
													'id' => $id,
													'imageFormat' => $imageFormat,
													'nextModuleStepData' => $nextModuleStepData,
													'moduleStep1Data' => $nextModuleStep,
													'data' => $pageData,
													'prevId' => $prevId,
													'nextId' => $nextId,
													'use_for_tags' => $use_for_tags,
													'multiplyCheckbox' => $multiplyCheckbox,
													'multiplyCheckbox' => $multiplyCheckbox,
													'multiplyCheckboxCategory' => $multiplyCheckboxCategory]);

		return view('modules.core.step1', $data);
	}


	public function update(Request $request, $moduleAlias, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> first();
		$moduleBlocks = ModuleBlock :: where('top_level', $moduleStep -> id) -> orderBy('rang', 'desc') -> get();

		$updateQuery = [];

		foreach($moduleBlocks as $data) {
			// Validation
				if($data -> type !== 'alias' && $data -> type !== 'input_with_languages' && $data -> type !== 'editor_with_languages') {
					$validator = Validator :: make($request -> all(), array(
						$data -> db_column => $data -> validation
					));

					if($validator -> fails()) {
						return redirect() -> route('coreEditStep0', array($module -> alias, $id)) -> withErrors($validator) -> withInput();
					}
				} else {
					$validationData = [];

					foreach(Language :: where('published', 1) -> get() as $langData) {
						$validationData[$data -> db_column.'_'.$langData -> title] = $data -> validation;
					}
					
					$validator = Validator :: make($request -> all(), $validationData);

					if($validator -> fails()) {
						return redirect() -> route('coreEditStep0', array($module -> alias, $id)) -> withErrors($validator) -> withInput();
					}
				}
			//


			if($data -> type !== 'image'
				&& $data -> type !== 'file'
				&& $data -> type !== 'published'
				&& $data -> type !== 'rang'
				&& $data -> type !== 'alias'
				&& $data -> type !== 'input_with_languages'
				&& $data -> type !== 'editor_with_languages'
				&& $data -> type !== 'checkbox'
				&& $data -> type !== 'multiply_checkboxes_with_category') {
				$updateQuery[$data -> db_column] = (!is_null($request -> input($data -> db_column)) ? $request -> input($data -> db_column) : '');
			}

			if($data -> type === 'alias') {
				foreach(Language :: where('published', 1) -> get() as $langData) {
					$value = $request -> input($data -> db_column.'_'.$langData -> title);
					$value = preg_replace("/[^A-ZА-Яა-ჰ0-9 -]+/ui",
											'',
											$value);

					$value = mb_strtolower(trim($value));

					$symbols = array('     ', '    ', '   ', '  ', ' ', '.', ',', '!', '?', '=', '#', '%', '+', '*', '/', '_', '\'', '"');

					$replace_symbols = array('-', '-', '-', '-', '-', '-', '-', '', '-', '-', '', '', '-', '', '-', '-', '', '');

					$value = str_replace($symbols,
											$replace_symbols,
											$value);
											
					$updateQuery[$data -> db_column.'_'.$langData -> title] = $value;
				}
			}

			if($data -> type === 'input_with_languages') {
				foreach(Language :: where('published', 1) -> get() as $langData) {
					$updateQuery[$data -> db_column.'_'.$langData -> title] = $request -> input($data -> db_column.'_'.$langData -> title);
				}
			}

			if($data -> type === 'editor_with_languages') {
				foreach(Language :: where('published', 1) -> get() as $langData) {
					$updateQuery[$data -> db_column.'_'.$langData -> title] = $request -> input($data -> db_column.'_'.$langData -> title);
				}
			}

			if($data -> type === 'checkbox') {
				$updateQuery[$data -> db_column] = (!is_null($request -> input($data -> db_column)) ? $request -> input($data -> db_column) : 0);
			}


			$checkboxString = '';

			if($data -> type === 'multiply_checkboxes_with_category') {
				if($request -> input($data -> db_column)) {
					for($i = 0; $i < count($request -> input($data -> db_column)); $i++) {
						$checkboxString .= $request -> input($data -> db_column)[$i].',';
					}
				}
				
				$updateQuery[$data -> db_column] = $checkboxString;
			}
			

			$multiplyCheckboxString = '';

			if($data -> type === 'multiply_checkboxes') {
				if($request -> input($data -> db_column)) {
					for($i = 0; $i < count($request -> input($data -> db_column)); $i++) {
						$multiplyCheckboxString .= $request -> input($data -> db_column)[$i].',';
					}
				}

				$updateQuery[$data -> db_column] = $multiplyCheckboxString;
			}

			// Image
				if($data -> type === 'image') {
					if($request -> hasFile($data -> db_column)) {
						$prefix = '';

						if($data -> prefix) {
							$prefix = $data -> prefix.'_';
						}
						
						$validator = Validator :: make($request -> all(), array(
							$data -> db_column => 'mimes:jpeg,jpg,png,gif|required|max:10000'
						));
						
						if($validator -> fails()) {
							return redirect() -> route('coreEditStep0', array($module -> alias, $id)) -> withErrors($validator) -> withInput();
						}

						$request -> file($data -> db_column) -> storeAs('public/images/modules/'.$module -> alias.'/step_0', $prefix.$id.'.'.$data -> file_format);	
						
						$imagePath = 'app/public/images/modules/'.$module -> alias.'/step_0/'.$prefix.$id.'.'.$data -> file_format;

						if($data -> fit_type === 'fit') {
							$image = ImageManagerStatic :: make(storage_path($imagePath)) -> fit($data -> image_width,
																									$data -> image_height,
																									function() {},
																									$data -> fit_position);
						}
						
						if($data -> fit_type === 'resize') {
							$image = ImageManagerStatic :: make(storage_path($imagePath)) -> resize($data -> image_width,
																									$data -> image_height,
																									function ($constraint) {
																									$constraint->aspectRatio();
																									});
								
							$width = ImageManagerStatic::make(storage_path($imagePath)) -> width();
							$height = ImageManagerStatic::make(storage_path($imagePath)) -> height();

							if($width < $data -> image_width && $height < $data -> image_height) {
								$image = ImageManagerStatic :: make(storage_path($imagePath));																																			
							}
						}

						if($data -> fit_type === 'default') {
							$image = ImageManagerStatic :: make(storage_path($imagePath));
						}

						$image -> save();

						for($i = 1; $i < 4; $i++) {
							if($data -> { 'prefix_'.$i }) {
								$request -> file($data -> db_column) -> storeAs('public/images/modules/'.$module -> alias.'/step_0', $prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format );

								if($data -> { 'fit_type_'.$i } === 'fit') {
									$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/step_0/'.$prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format)) -> fit($data -> image_width,
																																															$data -> image_height,
																																															function() {},
																																															$data -> fit_position);
								}
								
								if($data -> { 'fit_type_'.$i } === 'resize') {
									$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/step_0/'.$prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format)) -> resize($data -> image_width,
																																															$data -> image_height,
																																															function ($constraint) {
																																																$constraint->aspectRatio();
																																															});

									
									$width = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module -> alias.'/step_0/'.$prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format)) -> width();
									$height = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module -> alias.'/step_0/'.$prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format)) -> height();

									if($width < $data -> image_width && $height < $data -> image_height) {
										$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/step_0/'.$prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format));																																			
									}
								}

								if($data -> { 'fit_type_'.$i } === 'default') {
									$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/step_0/'.$prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format));
								}

								$image -> save();
							}
						}
					}
				}
			// 

			// File
				if($data -> type === 'file') {
					if($request -> hasFile($data -> db_column)) {
						$prefix = '';

						if($data -> prefix) {
							$prefix = $data -> prefix.'_';
						}

						$validator = Validator :: make($request -> all(), array(
							$data -> db_column => "required|mimes:".$data -> file_format."|max:10000"
						));

						if($validator -> fails()) {

							return redirect() -> route('coreEditStep0', array($module -> alias, $id)) -> withErrors($validator) -> withInput();
						}
						
						$request -> file($data -> db_column) -> storeAs('public/images/modules/'.$module -> alias.'/step_0', $prefix.$id.'.'.$data -> file_format);
					}
				}
			// 

		}

		DB :: table($moduleStep -> db_table) -> where('id', $id) -> update($updateQuery);


		// Status for success.
			$request -> session() -> flash('successStatus', 'Data is Saved!');
		//

		return redirect() -> route('coreEditStep0', array($module -> alias, $id));
	}


	public function delete($moduleAlias, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> first();

		DB :: table($moduleStep -> db_table) -> delete($id);

		return redirect() -> route('coreGetStep0', $module -> alias);
	}


	private static function deleteEmpty() {
		foreach(Module :: get() as $module) {
			foreach(ModuleStep :: where('top_level', $module -> id) -> get() as $moduleStep) {
				foreach(DB :: table($moduleStep -> db_table) -> get() as $dbTableData) {
					$data = [];
					$validateRules = [];

					foreach(ModuleBlock :: where('top_level', $moduleStep -> id) -> get() as $moduleBlock) {
						if($moduleBlock -> validation) {
							if($moduleBlock -> type === 'alias' || $moduleBlock -> type === 'input_with_languages' || $moduleBlock -> type === 'editor_with_languages') {
								foreach(Language :: where('published', 1) -> get() as $langData) {
									$validateRules[$moduleBlock -> db_column.'_'.$langData -> title] = $moduleBlock -> validation;
									$data[$moduleBlock -> db_column.'_'.$langData -> title] = $dbTableData -> { $moduleBlock -> db_column.'_'.$langData -> title };
								}
							} else {
								$validateRules[$moduleBlock -> db_column] = $moduleBlock -> validation;
								$data[$moduleBlock -> db_column] = $dbTableData -> { $moduleBlock -> db_column };
							}
						}
					}

					$validator = Validator :: make($data, $validateRules);

					if($validator -> fails()) {
						DB :: table($moduleStep -> db_table) -> delete($dbTableData -> id);
					}
				}
			}
		}
	}
}