<?php
namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\ModuleStep;
use App\Models\ModuleBlock;
use App\Models\Language;
use App\Models\Bsc;
use App\Models\Bsw;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic;
use DB;


class ACoreControllerStep3 extends AController {
    public function add($moduleAlias, $parentFirst, $parentSecond, $parentThird) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(3) -> take(1) -> first();

		$newRowId = DB :: table($moduleStep -> db_table) -> insertGetId(array('parent' => $parentThird));

		return redirect() -> route('coreEditStep3', array($module -> alias, $parentFirst, $parentSecond, $parentThird, $newRowId));
		// return $moduleStep -> db_table;
	}


	public function edit($moduleAlias, $parentFirst, $parentSecond, $parentThird, $id) {
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

				foreach(DB :: table($data -> select_table) -> orderBy($data -> select_sort_by, $data -> select_sort_by_text) -> get() as $dataInside) {
					$selectData[$data -> db_column][$dataInside -> { $data -> select_search_column }] = $dataInside -> $data -> select_option_text;
				}
			}
			
			if($data -> type === 'select_with_optgroup') {
				$selectOptgroudData[$data -> db_column][0] = '-- '.Bsw :: where('system_word', 'a_select') -> first() -> { 'word_'.$activeLang -> title }.' --';
				
				// $sort_by_this = $data -> select_sort_by_text;

				// $selectOptgroudData[$data -> db_column] = array('Cats' => array('45' => 'Leopard','124' => 'Lion'),
				// 												'tiger' => array('12' => 'Grizzle'),
				// 													'Dogs' => array('54' => 'Spaniel'),
				// 																);

				foreach(DB :: table($data -> select_optgroup_table) -> orderBy($data -> select_optgroup_sort_by, 'desc') -> get() as $dataInside) {
					// $selectOptgroudData[$data -> db_column][$dataInside -> id] = $dataInside -> $tempVar;

					// $banks = Bank::pluck('name', 'id'); 

					foreach(DB :: table($data -> select_optgroup_2_table) -> orderBy($data -> select_optgroup_2_sort_by, 'desc') -> get() as $dataInsideTwice) {
						$selectOptgroudData[$data -> db_column] = array($dataInside -> { $data -> select_optgroup_text } => array($dataInside -> id => $dataInsideTwice -> { $data -> select_optgroup_2_text },'124' => 'Lion'),
																		'tiger' => array('12' => 'Grizzle'),
																		'Dogs' => array('54' => 'Spaniel'));
					}
				}
			}
		}

		// <!-- Form:: -->
		$use_for_sort = 'rang';

		$moduleStep1 = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $moduleStep1 -> id) -> orderBy('rang', 'desc') -> first();
		$moduleStep2 = ModuleStep :: where('top_level', $moduleStep1 -> id) -> orderBy('rang', 'desc') -> skip(3) -> take(1) -> first();
		$moduleBlockStep2 = ModuleBlock :: where('top_level', $moduleStep2 -> id) -> where('a_use_for_tags', 1) -> first();

		$pageParentData = DB :: table($moduleParentStep -> db_table) -> find($parentFirst);
		$pageParentDataSecond = DB :: table($moduleParentStep2 -> db_table) -> find($parentSecond);
		$pageParentDataThird = DB :: table($moduleParentStep3 -> db_table) -> find($parentThird);

		// $moduleParent = ModuleStep :: where('top_level', $moduleStep1 -> id) -> orderBy('rang', 'desc') -> first();

		
		$imageFormat = 'jpg';

		$moduleBlockForImage = ModuleBlock :: where('top_level', $moduleStep -> id) -> where('type', 'image') -> first();

		if($moduleBlockForImage) {
			$imageFormat = $moduleBlockForImage -> file_format;
		}


		$data = array_merge(self :: getDefaultData(), ['module' => $module,
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
														'imageFormat' => $imageFormat,
														'prevId' => $prevId,
														'nextId' => $nextId,
														'use_for_tags' => $use_for_tags,
														'parentData' => $pageParentData,
														'parentDataSecond' => $pageParentDataSecond,
														'parentDataThird' => $pageParentDataThird]);

		// return $moduleStep2 -> db_table;
		return view('modules.core.step4', $data);
	}


	public function update(Request $request, $moduleAlias, $parentFirst, $parentSecond, $parentThird, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(3) -> take(1) -> first();
		$moduleBlocks = ModuleBlock :: where('top_level', $moduleStep -> id) -> orderBy('rang', 'desc') -> get();

		$updateQuery = [];

		foreach($moduleBlocks as $data) {
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


			// if($data -> type !== 'published' && $data -> type !== 'rang' && $data -> type !== 'alias') {
			// 	$updateQuery[$data -> db_column] = (!is_null($request -> input($data -> db_column)) ? $request -> input($data -> db_column) : '');
			// }

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


			//image
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
							return redirect() -> route('coreEditStep1', array($module -> alias, $parent, $id)) -> withErrors($validator) -> withInput();
						}
						
						$request -> file($data -> db_column) -> storeAs('public/images/modules/'.$module -> alias.'/step_3', $prefix.$id.'.'.$data -> file_format);	
						
						$imagePath = 'app/public/images/modules/'.$module -> alias.'/step_3/'.$prefix.$id.'.'.$data -> file_format;

						$image = ImageManagerStatic :: make(storage_path($imagePath));
						$width = $image -> width();
						$height = $image -> height();

						if($data -> fit_type === 'fit') {
							$image = $image -> fit($data -> image_width,
													$data -> image_height,
													function() {},
													$data -> fit_position);
						}
						
						if($data -> fit_type === 'resize') {
							$image = $image -> resize($data -> image_width,
														$data -> image_height,
														function ($constraint) {
														$constraint->aspectRatio();
														});

							if($width < $data -> image_width && $height < $data -> image_height) {
								$image = ImageManagerStatic :: make(storage_path($imagePath));																																			
							}
						}

						if($data -> fit_type === 'resize_with_bg') {
							if($width > $data -> image_width || $height > $data -> image_height) {
								$image -> resize($data -> image_width,
													$data -> image_height,
													function ($constraint) {
													$constraint->aspectRatio();
													});																																	
							}

							$image->resizeCanvas($data -> image_width, $data -> image_height, 'center', false, '#FFFFFF');
						}

						if($data -> fit_type === 'default') {
							$image = ImageManagerStatic :: make(storage_path($imagePath));
						}
						
						$image -> save();

						for($i = 1; $i < 4; $i++) {
							if($data -> { 'prefix_'.$i }) {
								$request -> file('image') -> storeAs('public/images/modules/'.$module -> alias.'/step_3', $prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format );

								if($data -> { 'fit_type_'.$i } === 'fit') {
									$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/step_3/'.$prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format)) -> fit($data -> image_width,
																																																							$data -> image_height,
																																																							function() {},
																																																							$data -> fit_position);
								}
								
								if($data -> { 'fit_type_'.$i } === 'resize') {
									$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/step_3/'.$prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format)) -> resize($data -> image_width,
																																																								$data -> image_height,
																																																								function ($constraint) {
																																																									$constraint->aspectRatio();
																																																								});
									
									$width = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module -> alias.'/step_3/'.$prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format)) -> width();
									$height = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module -> alias.'/step_3/'.$prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format)) -> height();

									if($width < $data -> image_width && $height < $data -> image_height) {
										$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/step_3/'.$prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format));																																			
									}
								}

								if($data -> { 'fit_type_'.$i } === 'resize_with_bg') {
									if($width > $data -> image_width || $height > $data -> image_height) {
										$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/step_3/'.$prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format)) -> resize($data -> image_width,
																																																									$data -> image_height,
																																																									function ($constraint) {
																																																									$constraint->aspectRatio();
																																																									});																																	
									}
									
									$image -> resizeCanvas($data -> image_width, $data -> image_height, 'center', false, '#FFFFFF');
								}

								if($data -> { 'fit_type_'.$i } === 'default') {
									$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/step_3/'.$prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format));
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

						// $extension = $request -> file('file') -> extension();

						// if($data -> file_format == $extension) {
								
						// }

						$validator = Validator :: make($request -> all(), array(
							$data -> db_column => "required|mimes:".$data -> file_format."|max:10000"
						));

						if($validator -> fails()) {
							return redirect() -> route('coreEditStep1', array($module -> alias, $parent, $id)) -> withErrors($validator) -> withInput();
						}
						
						// if($request -> hasFile('image') && $request -> file('image') -> isValid()) {
						// return file_get_contents('images/modules/'.$module -> alias.'/'.$id.'.jpg');
						
						$request -> file($data -> db_column) -> storeAs('public/images/modules/'.$module -> alias.'/step_3', $prefix.$id.'.'.$data -> file_format);
						// return $extension;
					}
				}
			//
		}

		DB :: table($moduleStep -> db_table) -> where('id', $id) -> update($updateQuery);

		return redirect() -> route('coreEditStep3', array($module -> alias, $parentFirst, $parentSecond, $parentThird, $id));
		// return $moduleStep -> db_table;
	}


	public function delete($moduleAlias, $parentFirst, $parentSecond, $parentThird, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(3) -> take(1) -> first();

		DB :: table($moduleStep -> db_table) -> delete($id);

		return redirect() -> route('coreEditStep2', array($module -> alias, $parentFirst, $parentSecond, $parentThird));
		// return $moduleStep -> db_table;
	}
}