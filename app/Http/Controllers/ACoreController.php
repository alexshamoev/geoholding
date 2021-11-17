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
use Intervention\Image\Image;
use DB;


class ACoreController extends Controller {
	private static function cropImage(Image $image, $width, $height ,$x=null, $y=null, $bg_color=null){
        // What is the size of the image to crop
        $image_width=$image->width();
        $image_height=$image->height();

        // Do we have a special case based on the following conditions
        if ($image_width<$width+abs($x) or $x<0   // Is the crop width outside the image
            or $image_height<$height+abs($y) or $y<0) {// Is the crop height outside the image

            // Determine the size of background image
            $canvas_width=abs($x)+$width;
            $canvas_height=abs($y)+ $height;

            // Create a background image with  background color ;
            $background = \Intervention\Image\Image::canvas($canvas_width, $canvas_height);
            if ($bg_color) {
                $background->fill($bg_color);
            }
            
            // Determine the insert position of the image to crop inside the background image
            $ins_x=abs(($x-abs($x))/2);
            $ins_y=abs(($y-abs($y))/2);

            // Adjust x and y with respect to the background image
            $x=abs(($x+abs($x))/2);
            $y=abs(($y+abs($y))/2);

            // Insert the image to crop into the background.
            //TODO: I can't really think now, but I think we could just return this as the crop?
            $background->insert($image, 'top-left',$ins_x,$ins_y);
            
            //TODO: Any need to unset $image here to reclaim memory? 
            //unset($image);

            $image=$background;

            //TODO: Any need for this to reclaim memory? 
            unset($background);
        }

        return $image->crop($width,$height,$x,$y);
    }

    public function getStep0($moduleAlias) {
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


		$defaultData = ADefaultData :: get();

		$data = array_merge($defaultData, ['module' => $module,
											'moduleStep' => $moduleStep,
											'moduleSteps' => ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> get(),
											'moduleStepData' => DB :: table($moduleStep -> db_table) -> orderBy($orderBy, $sortBy) -> get(),
											'sortBy' => $orderBy,
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
			if($data -> type === 'select') {
				$selectData[$data -> db_column][0] = '-- '.Bsw :: where('system_word', 'a_select') -> first() -> { 'word_'.$activeLang -> title }.' --';

				$tempVar = $data -> select_option_text;
				$sort_by_this = $data -> select_sort_by_text;

				foreach(DB :: table($data -> select_table) -> orderBy($data -> select_sort_by, $sort_by_this) -> get() as $dataInside) {
					$selectData[$data -> db_column][$dataInside -> id] = $dataInside -> $tempVar;
				}
			}
			
			if($data -> type === 'select_with_optgroup') {
				$selectOptgroudData[$data -> db_column][0] = '-- '.Bsw :: where('system_word', 'a_select') -> first() -> { 'word_'.$activeLang -> title }.' --';
				$tempVar = $data -> select_optgroup_text;														
				$alex = array('-- '.Bsw :: where('system_word', 'a_select') -> first() -> { 'word_'.$activeLang -> title }.' --');

				foreach(DB :: table($data -> select_optgroup_table) -> orderBy($data -> select_optgroup_sort_by, 'desc') -> get() as $dataInside) {
					$tempVarSecond = $data -> select_optgroup_2_text;

					foreach(DB :: table($data -> select_optgroup_2_table) -> where('parent', $dataInside -> id) -> orderBy($data -> select_optgroup_2_sort_by, 'desc') -> get() as $dataInsideTwice) {
						$alex[$dataInside -> $tempVar][$dataInsideTwice -> id] = $dataInsideTwice -> $tempVarSecond;
					}
				}

				$selectOptgroudData[$data -> db_column] = $alex;
			}
			

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
		$defaultData = ADefaultData :: get();

		$moduleStepTableData = false;

		$moduleStep1 = Module :: where('alias', $moduleAlias) -> first();
		$moduleStepStep1 = ModuleStep :: where('top_level', $moduleStep1 -> id) -> orderBy('rang', 'desc') -> skip(1) -> take(1) -> first();
		
		if($moduleStepStep1) {
			$moduleStepTableData = DB :: table($moduleStepStep1 -> db_table) -> where('parent', $id) -> orderBy($use_for_sort, 'desc') -> get();
		}

		$moduleBlockForSort = ModuleBlock :: where('top_level', $moduleStep1 -> id) -> where('a_use_for_sort', 1) -> first();

		$use_for_sort = 'id';
		$sort_by = 'DESC';

		if($moduleBlockForSort) {
			$use_for_sort = $moduleBlockForSort -> db_column;

			if(!$moduleBlockForSort -> sort_by_desc) {
				$sort_by = 'ASC';
			}
		}

		$data = array_merge($defaultData, ['module' => $module,
											'moduleStep' => $moduleStepStep1,
											'moduleStepData' => DB :: table($moduleStep -> db_table) -> orderBy($use_for_sort, $sort_by) -> get(),
											'moduleBlocks' => $moduleBlocks,
											'selectData' => $selectData,
											'selectOptgroudData' => $selectOptgroudData,
											'languages' => Language :: where('published', 1) -> orderBy('rang', 'desc') -> get(),
											'sortBy' => $use_for_sort,
											'id' => $id,
											'moduleStepTableData' => $moduleStepTableData,
											'moduleStep1Data' => $moduleStepStep1,
											'data' => $pageData,
											'prevId' => $prevId,
											'nextId' => $nextId,
											'use_for_tags' => $use_for_tags,
											'multiplyCheckbox' => $multiplyCheckbox,
											'multiplyCheckboxCategory' => $multiplyCheckboxCategory]);

		return view('modules.core.step1', $data);
	}


	public function updateStep0(Request $request, $moduleAlias, $id) {
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


			// dd($request -> all());
 

			// Image
				if($data -> type === 'image') {
					if($request -> hasFile('image')) {
						// if($request -> hasFile('image') && $request -> file('image') -> isValid()) {
						// return file_get_contents('images/modules/'.$module -> alias.'/'.$id.'.jpg');
						
						$request -> file('image') -> storeAs('public/images/modules/'.$module -> alias, $id.'.jpg');	
						

						if($data -> fit_type === 'fit') {
							$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/'.$id.'.jpg')) -> fit($data -> image_width,
																																					$data -> image_height,
																																					function() {},
																																					$data -> fit_position);
						}
						
						if($data -> fit_type === 'resize') {
							$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/'.$id.'.jpg')) -> resize($data -> image_width,
																																						$data -> image_height,
																																						function ($constraint) {
																																							$constraint->aspectRatio();
																																						});
						}

							// $image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/'.$id.'.jpg')) -> fill('#ff00ff',
							// 																														0,
							// 																														0);
				
						// $image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/'.$id.'.jpg'));

						// self :: cropImage($image, $data -> image_width, $data -> image_height, null, null, '#808080');
						
						$image -> save();

						for($i = 1; $i < 4; $i++) {
							if($data -> { 'prefix_'.$i }) {
								$request -> file('image') -> storeAs('public/images/modules/'.$module -> alias, $id.'_'.$data -> { 'prefix_'.$i }.'.jpg' );

								if($data -> { 'fit_type_'.$i } === 'fit') {
									$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/'.$id.'_'.$data -> { 'prefix_'.$i }.'.jpg')) -> fit($data -> image_width,
																																															$data -> image_height,
																																															function() {},
																																															$data -> fit_position);
								}
								
								if($data -> { 'fit_type_'.$i } === 'resize') {
									$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/'.$id.'_'.$data -> { 'prefix_'.$i }.'.jpg')) -> resize($data -> image_width,
																																															$data -> image_height,
																																															function ($constraint) {
																																																$constraint->aspectRatio();
																																															});
								}

								$image -> save();
							}
						}
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


	public function deleteStep0($moduleAlias, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> first();

		DB :: table($moduleStep -> db_table) -> delete($id);

		return redirect() -> route('coreGetStep0', $module -> alias);
	}

	
	public function addStep1($moduleAlias, $parent) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(1) -> take(1) -> first();
		// $parent = 7;

		$newRowId = DB :: table($moduleStep -> db_table) -> insertGetId(array('parent' => $parent));

		return redirect() -> route('coreEditStep1', array($module -> alias, $parent, $newRowId));
		// return $newRowId;
	}


	public function editStep1($moduleAlias, $parent, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleParentStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(1) -> take(1) -> first();
		$moduleBlocks = ModuleBlock :: where('top_level', $moduleStep -> id) -> orderBy('rang', 'desc') -> get();
		$pageData = DB :: table($moduleStep -> db_table) -> find($id);
		$pageParentData = DB :: table($moduleParentStep -> db_table) -> find($parent);

		$moduleBlock = ModuleBlock :: where('top_level', $moduleStep -> id) -> where('a_use_for_tags', 1) -> first();

		$use_for_tags = 'id';

		if($moduleBlock) {
			$use_for_tags = $moduleBlock -> db_column;

			if($moduleBlock -> type === 'alias' || $moduleBlock -> type === 'input_with_languages' || $moduleBlock -> type === 'editor_with_languages') {
				$use_for_tags .= '_ge';
			}
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

		
		$selectData = [];
		$selectOptgroudData = [];

		foreach(ModuleBlock :: where('top_level', $moduleStep -> id) -> orderBy('rang', 'desc') -> get() as $data) {
			if($data -> type === 'select') {
				$selectData[$data -> db_column][0] = '-- '.Bsw :: where('system_word', 'a_select') -> first() -> { 'word_'.$activeLang -> title }.' --';

				$tempVar = $data -> select_option_text;
				$sort_by_this = $data -> select_sort_by_text;

				foreach(DB :: table($data -> select_table) -> orderBy($data -> select_sort_by, $sort_by_this) -> get() as $dataInside) {
					$selectData[$data -> db_column][$dataInside -> id] = $dataInside -> $tempVar;
				}
			}
			
			if($data -> type === 'select_with_optgroup') {
				$selectOptgroudData[$data -> db_column][0] = '-- '.Bsw :: where('system_word', 'a_select') -> first() -> { 'word_'.$activeLang -> title }.' --';

				$tempVar = $data -> select_optgroup_text;

				foreach(DB :: table($data -> select_optgroup_table) -> orderBy($data -> select_optgroup_sort_by, 'desc') -> get() as $dataInside) {
					$tempVarSecond = $data -> select_optgroup_2_text;

					foreach(DB :: table($data -> select_optgroup_2_table) -> orderBy($data -> select_optgroup_2_sort_by, 'desc') -> get() as $dataInsideTwice) {
						$selectOptgroudData[$data -> db_column] = array($dataInside -> $tempVar => array($dataInside -> id => $dataInsideTwice -> $tempVarSecond,'124' => 'Lion'),
																		'tiger' => array('12' => 'Grizzle'),
																		'Dogs' => array('54' => 'Spaniel'));
					}
				}
			}
		}


		$use_for_sort = 'rang';
		$defaultData = ADefaultData :: get();

		$moduleStep1 = Module :: where('alias', $moduleAlias) -> first();
		$moduleStepStep1 = ModuleStep :: where('top_level', $moduleStep1 -> id) -> orderBy('rang', 'desc') -> skip(1) -> take(1) -> first();
		$moduleBlockStep1 = ModuleBlock :: where('top_level', $moduleStepStep1 -> id) -> where('a_use_for_tags', 1) -> first();

		$moduleStep2 = ModuleStep :: where('top_level', $moduleStep1 -> id) -> orderBy('rang', 'desc') -> skip(2) -> take(1) -> first();

		// return $moduleStep2;

		$data = array_merge($defaultData, ['module' => $module,
											'moduleStep' => $moduleStep,
											'moduleStepData' => DB :: table($moduleStep -> db_table) -> orderBy('rang', 'desc') -> get(),
											'moduleBlocks' => $moduleBlocks,
											'selectData' => $selectData,
											'selectOptgroudData' => $selectOptgroudData,
											'languages' => Language :: where('published', 1) -> get(),
											'sortBy' => $use_for_sort,
											'id' => $id,
											'moduleStepTableData' => DB :: table($moduleStepStep1 -> db_table) -> where('parent', $id) ->  orderBy($use_for_sort, 'desc') -> get(),
											'moduleStep1Data' => $moduleStepStep1,
											'moduleStep2' => $moduleStep2,
											'moduleStepTableData2' => DB :: table($moduleStep2 -> db_table) -> where('parent', $id) ->  orderBy($use_for_sort, 'desc') -> get(),
											'data' => $pageData,
											'prevId' => $prevId,
											'nextId' => $nextId,
											'use_for_tags' => $use_for_tags,
											'parentData' => $pageParentData]);

		return view('modules.core.step2', $data);
	}


	public function updateStep1(Request $request, $moduleAlias, $parent, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(1) -> take(1) -> first();
		$moduleBlocks = ModuleBlock :: where('top_level', $moduleStep -> id) -> orderBy('rang', 'desc') -> get();

		$updateQuery = [];

		foreach($moduleBlocks as $data) {
			if($data -> type !== 'image'
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





			// if($data -> type === 'alias') {
			// 	$value = $request -> input($data -> db_column);
			// 	$value = preg_replace("/[^A-ZА-Яა-ჰ0-9 -]+/ui",
			// 							'',
			// 							$value);

			// 	// $value = strtolower(trim($value));
			// 	$value = mb_strtolower(trim($value));

			// 	$symbols = array('     ', '    ', '   ', '  ', ' ', '.', ',', '!', '?', '=', '#', '%', '+', '*', '/', '_', '\'', '"');

			// 	$replace_symbols = array('-', '-', '-', '-', '-', '-', '-', '', '-', '-', '', '', '-', '', '-', '-', '', '');

			// 	$value = str_replace($symbols,
			// 							$replace_symbols,
			// 							$value);
										
			// 	$updateQuery[$data -> db_column] = $value;
			// }

		}

		DB :: table($moduleStep -> db_table) -> where('id', $id) -> update($updateQuery);

		return redirect() -> route('coreEditStep1', array($module -> alias, $parent, $id));

		// return $moduleStep -> db_table;
	}

	
	public function deleteStep1($moduleAlias, $parent, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(1) -> take(1) -> first();

		DB :: table($moduleStep -> db_table) -> delete($id);

		return redirect() -> route('coreEditStep0', array($module -> alias, $parent));
	}


	public function addStep2($moduleAlias, $parentFirst, $parentSecond) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(2) -> take(1) -> first();

		$newRowId = DB :: table($moduleStep -> db_table) -> insertGetId(array('parent' => $parentSecond));

		return redirect() -> route('coreEditStep2', array($module -> alias, $parentFirst, $parentSecond, $newRowId));
		// return $moduleStep -> db_table;
	}


	public function editStep2($moduleAlias, $parentFirst, $parentSecond, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleParentStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> first();
		$moduleParentStep2 = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(1) -> take(1) ->first();

		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(2) -> take(1) -> first();
		$moduleBlocks = ModuleBlock :: where('top_level', $moduleStep -> id) -> orderBy('rang', 'desc') -> get();
		$pageData = DB :: table($moduleStep -> db_table) -> find($id);
		$pageParentData = DB :: table($moduleParentStep -> db_table) -> find($parentFirst);
		$pageParentDataSecond = DB :: table($moduleParentStep2 -> db_table) -> find($parentSecond);

		$moduleBlock = ModuleBlock :: where('top_level', $moduleStep -> id) -> where('a_use_for_tags', 1) -> first();

		$use_for_tags = 'id';

		if($moduleBlock) {
			$use_for_tags = $moduleBlock -> db_column;

			if($moduleBlock -> type === 'alias' || $moduleBlock -> type === 'input_with_languages' || $moduleBlock -> type === 'editor_with_languages') {
				$use_for_tags .= '_ge';
			}
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

		
		$selectData = [];
		$selectOptgroudData = [];

		foreach(ModuleBlock :: where('top_level', $moduleStep -> id) -> orderBy('rang', 'desc') -> get() as $data) {
			if($data -> type === 'select') {
				$selectData[$data -> db_column][0] = '-- '.Bsw :: where('system_word', 'a_select') -> first() -> { 'word_'.$activeLang -> title }.' --';

				$tempVar = $data -> select_option_text;
				$sort_by_this = $data -> select_sort_by_text;

				foreach(DB :: table($data -> select_table) -> orderBy($data -> select_sort_by, $sort_by_this) -> get() as $dataInside) {
					$selectData[$data -> db_column][$dataInside -> id] = $dataInside -> $tempVar;
				}
			}
			
			if($data -> type === 'select_with_optgroup') {
				$selectOptgroudData[$data -> db_column][0] = '-- '.Bsw :: where('system_word', 'a_select') -> first() -> { 'word_'.$activeLang -> title }.' --';

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
		$use_for_sort = 'rang';
		$defaultData = ADefaultData :: get();

		$moduleStep1 = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $moduleStep1 -> id) -> orderBy('rang', 'desc') -> first();
		$moduleStep2 = ModuleStep :: where('top_level', $moduleStep1 -> id) -> orderBy('rang', 'desc') -> skip(2) -> take(1) -> first();
		$moduleStep3 = ModuleStep :: where('top_level', $moduleStep1 -> id) -> orderBy('rang', 'desc') -> skip(3) -> take(1) -> first();
		$moduleBlockStep2 = ModuleBlock :: where('top_level', $moduleStep2 -> id) -> where('a_use_for_tags', 1) -> first();

		// $moduleParent = ModuleStep :: where('top_level', $moduleStep1 -> id) -> orderBy('rang', 'desc') -> first();

		
		$data = array_merge($defaultData, ['module' => $module,
											'moduleStep' => $moduleStep,
											'moduleStepData' => DB :: table($moduleStep -> db_table) -> orderBy('rang', 'desc') -> get(),
											'moduleBlocks' => $moduleBlocks,
											'selectData' => $selectData,
											'selectOptgroudData' => $selectOptgroudData,
											'languages' => Language :: where('published', 1) -> get(),
											'sortBy' => $use_for_sort,
											'id' => $id,
											'parentFirst' => $parentFirst,
											'parentSecond' => $parentSecond,
											'moduleStepTableData2' => DB :: table($moduleStep2 -> db_table) -> where('parent', $id) ->  orderBy($use_for_sort, 'desc') -> get(),
											'moduleStepTableData3' => DB :: table($moduleStep3 -> db_table) -> where('parent', $id) ->  orderBy($use_for_sort, 'desc') -> get(),
											'moduleStep2' => $moduleStep2,
											'moduleStep3' => $moduleStep3,
											'data' => $pageData,
											'prevId' => $prevId,
											'nextId' => $nextId,
											'use_for_tags' => $use_for_tags,
											'parentData' => $pageParentData,
											'parentDataSecond' => $pageParentDataSecond]);

		// return $moduleStep2 -> db_table;
		return view('modules.core.step3', $data);
	}


	public function updateStep2(Request $request, $moduleAlias, $parentFirst, $parentSecond, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(2) -> take(1) -> first();
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

				// $value = strtolower(trim($value));
				$value = mb_strtolower(trim($value));

				$symbols = array('     ', '    ', '   ', '  ', ' ', '.', ',', '!', '?', '=', '#', '%', '+', '*', '/', '_', '\'', '"');

				$replace_symbols = array('-', '-', '-', '-', '-', '-', '-', '', '-', '-', '', '', '-', '', '-', '-', '', '');

				$value = str_replace($symbols,
										$replace_symbols,
										$value);
										
				$updateQuery[$data -> db_column] = $value;
			}
		}

		DB :: table($moduleStep -> db_table) -> where('id', $id) -> update($updateQuery);

		return redirect() -> route('coreEditStep2', array($module -> alias, $parentFirst, $parentSecond, $id));
		// return $moduleStep -> db_table;
	}


	public function deleteStep2($moduleAlias, $parentFirst, $parentSecond, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(2) -> take(1) -> first();

		DB :: table($moduleStep -> db_table) -> delete($id);

		return redirect() -> route('coreEditStep1', array($module -> alias, $parentFirst, $parentSecond));
		// return $moduleAlias.' '.$parentFirst.' '.$parentSecond.' '.$id;
	}


	public function addStep3($moduleAlias, $parentFirst, $parentSecond, $parentThird) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(3) -> take(1) -> first();

		$newRowId = DB :: table($moduleStep -> db_table) -> insertGetId(array('parent' => $parentThird));

		return redirect() -> route('coreEditStep3', array($module -> alias, $parentFirst, $parentSecond, $parentThird, $newRowId));
		// return $moduleStep -> db_table;
	}


	public function editStep3($moduleAlias, $parentFirst, $parentSecond, $parentThird, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleParentStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> first();
		$moduleParentStep2 = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(1) -> take(1) ->first();
		$moduleParentStep3 = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(2) -> take(1) ->first();

		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(3) -> take(1) -> first();
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

		
		$selectData = [];
		$selectOptgroudData = [];

		foreach(ModuleBlock :: where('top_level', $moduleStep -> id) -> orderBy('rang', 'desc') -> get() as $data) {
			if($data -> type === 'select') {
				$selectData[$data -> db_column][0] = '-- '.Bsw :: where('system_word', 'a_select') -> first() -> { 'word_'.$activeLang -> title }.' --';

				$tempVar = $data -> select_option_text;
				$sort_by_this = $data -> select_sort_by_text;

				foreach(DB :: table($data -> select_table) -> orderBy($data -> select_sort_by, $sort_by_this) -> get() as $dataInside) {
					$selectData[$data -> db_column][$dataInside -> id] = $dataInside -> $tempVar;
				}
			}
			
			if($data -> type === 'select_with_optgroup') {
				$selectOptgroudData[$data -> db_column][0] = '-- '.Bsw :: where('system_word', 'a_select') -> first() -> { 'word_'.$activeLang -> title }.' --';

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
		$use_for_sort = 'rang';
		$defaultData = ADefaultData :: get();

		$moduleStep1 = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $moduleStep1 -> id) -> orderBy('rang', 'desc') -> first();
		$moduleStep2 = ModuleStep :: where('top_level', $moduleStep1 -> id) -> orderBy('rang', 'desc') -> skip(3) -> take(1) -> first();
		$moduleBlockStep2 = ModuleBlock :: where('top_level', $moduleStep2 -> id) -> where('a_use_for_tags', 1) -> first();

		$pageParentData = DB :: table($moduleParentStep -> db_table) -> find($parentFirst);
		$pageParentDataSecond = DB :: table($moduleParentStep2 -> db_table) -> find($parentSecond);
		$pageParentDataThird = DB :: table($moduleParentStep3 -> db_table) -> find($parentThird);

		// $moduleParent = ModuleStep :: where('top_level', $moduleStep1 -> id) -> orderBy('rang', 'desc') -> first();

		
		$data = array_merge($defaultData, ['module' => $module,
											'moduleStep' => $moduleStep,
											'moduleStepData' => DB :: table($moduleStep -> db_table) -> orderBy('rang', 'desc') -> get(),
											'moduleBlocks' => $moduleBlocks,
											'selectData' => $selectData,
											'selectOptgroudData' => $selectOptgroudData,
											'languages' => Language :: where('published', 1) -> get(),
											'sortBy' => $use_for_sort,
											'id' => $id,
											'parentFirst' => $parentFirst,
											'parentSecond' => $parentSecond,
											'parentThird' => $parentThird,
											'moduleStepTableData2' => DB :: table($moduleStep2 -> db_table) -> where('parent', $id) ->  orderBy($use_for_sort, 'desc') -> get(),
											'moduleStep2' => $moduleStep2,
											'data' => $pageData,
											'prevId' => $prevId,
											'nextId' => $nextId,
											'use_for_tags' => $use_for_tags,
											'parentData' => $pageParentData,
											'parentDataSecond' => $pageParentDataSecond,
											'parentDataThird' => $pageParentDataThird]);

		// return $moduleStep2 -> db_table;
		return view('modules.core.step4', $data);
	}


	public function updateStep3(Request $request, $moduleAlias, $parentFirst, $parentSecond, $parentThird, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(3) -> take(1) -> first();
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

				$value = mb_strtolower(trim($value));

				$symbols = array('     ', '    ', '   ', '  ', ' ', '.', ',', '!', '?', '=', '#', '%', '+', '*', '/', '_', '\'', '"');

				$replace_symbols = array('-', '-', '-', '-', '-', '-', '-', '', '-', '-', '', '', '-', '', '-', '-', '', '');

				$value = str_replace($symbols,
										$replace_symbols,
										$value);
										
				$updateQuery[$data -> db_column] = $value;
			}
		}

		DB :: table($moduleStep -> db_table) -> where('id', $id) -> update($updateQuery);

		return redirect() -> route('coreEditStep3', array($module -> alias, $parentFirst, $parentSecond, $parentThird, $id));
		// return $moduleStep -> db_table;
	}


	public function deleteStep3($moduleAlias, $parentFirst, $parentSecond, $parentThird, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(3) -> take(1) -> first();

		DB :: table($moduleStep -> db_table) -> delete($id);

		return redirect() -> route('coreEditStep2', array($module -> alias, $parentFirst, $parentSecond, $parentThird));
		// return $moduleStep -> db_table;
	}
}