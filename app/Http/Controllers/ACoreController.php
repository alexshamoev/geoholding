<?php
namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\ModuleStep;
use App\Models\ModuleBlock;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic;
use DB;
use Session;
use App;
use Storage;


class ACoreController extends AController {
    public function get($moduleAlias) {
		$module = Module::where('alias', $moduleAlias)->first();
		$moduleStep = ModuleStep::where('top_level', $module->id)
								->where('parent_step_id', '0')
								->orderBy('rang', 'desc')
								->get();

		$collection = collect([]);
		$collectionForTags = collect([]);

		foreach($moduleStep as $moduleStepData) {
			$imageFormat = 'jpg';

			$moduleBlockForImage = ModuleBlock::where('top_level', $moduleStepData->id)->where('type', 'image')->first();

			if($moduleBlockForImage) {
				$imageFormat = $moduleBlockForImage->file_format;
			}

			$collection->add(DB::table($moduleStepData->db_table)->orderBy($moduleStepData->order_by_column, $moduleStepData->order_by_sequence)->get());
			$collectionForTags->add($moduleStepData->main_column);
		}
		
		$data = array_merge(self::getDefaultData(), ['module' => $module,
													'moduleStep' => $moduleStep,
													'collection' => $collection,
													'imageFormat' => $imageFormat,
													'collectionForTags' => $collectionForTags]);

		return view('modules.core.start_point', $data);
	}


	public function add($moduleAlias, $moduleStepId, $topLevelDataId = 0) {
		$moduleStep = ModuleStep::find($moduleStepId);

		$selectData = [];
		$selectOptgroudData = [];
		$multCheckboxCatTable = '';

		foreach($moduleStep->moduleBlock as $data) {
			// Select
				if($data->type === 'select') {
					foreach(DB::table($data->select_table)->orderBy($data->select_sort_by, $data->select_sort_by_text)->get() as $dataInside) {
						$selectData[$data->db_column][$dataInside->{$data->select_search_column}] = $dataInside->{$data->select_option_text};
					}
				}
			// 
			
			// Select with optgroups
				if($data->type === 'select_with_optgroup') {
					$selectOptgroudData[$data->db_column][0] = '-- '.__('bsw.select').' --';
					$alex = array('-- '.__('bsw.select').' --');

					foreach(DB::table($data->select_optgroup_table)->orderBy($data->select_optgroup_sort_by, 'desc')->get() as $dataInside) {
						foreach(DB::table($data->select_optgroup_2_table)->where('top_level', $dataInside->id)->orderBy($data->select_optgroup_2_sort_by, 'desc')->get() as $dataInsideTwice) {
							$alex[$dataInside->{$data->select_optgroup_text}][$dataInsideTwice->id] = $dataInsideTwice->{$data->select_optgroup_2_text};
						}
					}

					$selectOptgroudData[$data->db_column] = $alex;
				}
			// 
			
			
			// Multiply Checkbox With Category
				$multiplyCheckboxCategory = [];

				if($data->type === 'multiply_checkboxes_with_category') {
					$checkboxTableText = $data->sql_select_with_checkboxes_option_text;														
					$checkboxArray = array();

					foreach(DB::table($data->sql_select_with_checkboxes_table)->orderBy($data->sql_select_with_checkboxes_sort_by, 'desc')->get() as $dataInside) {
						$checkboxTableTextInside = $data->sql_select_with_checkboxes_option_text_inside;
						$tempDbColumn = $data->db_column;
						$tempArray = explode(',', $pageData->$tempDbColumn);

						foreach(DB::table($data->sql_select_with_checkboxes_table_inside)->where('top_level', $dataInside->id)->orderBy($data->sql_select_with_checkboxes_sort_by_inside, 'desc')->get() as $dataInsideTwice) {
							$active = 0;
							foreach($tempArray as $tempData) {
								if($tempData == $dataInsideTwice->id) {
									$active = 1;
								}
							}

							$checkboxArray[$dataInside->$checkboxTableText][$dataInsideTwice->id] = array('title' => $dataInsideTwice->$checkboxTableTextInside, 'active' => $active);
						}
					}

					$multiplyCheckboxCategory[$data->db_column] = $checkboxArray;
				}
			//


			// Multiply Checkbox
				$multiplyCheckbox = [];
				
				if($data->type === 'multiply_checkboxes') {
					$checkboxText = $data->sql_select_with_checkboxes_option_text;														
					$checkboxArray = array();
					$active = 0;

					foreach(DB::table($data->sql_select_with_checkboxes_table)->orderBy($data->sql_select_with_checkboxes_sort_by, 'desc')->get() as $dataInside) {
						$tempDbColumn = $data->db_column;
						$tempArray = explode(',', $pageData->$tempDbColumn);

						foreach($tempArray as $tempData) {
							if($tempData == $dataInside->id) {
								$active = 1;
							}
						}

						$checkboxArray[$dataInside->id] = array('title' => $dataInside->$checkboxText, 'active' => $active);
					}
					
					$multiplyCheckbox[$data->db_column] = $checkboxArray;
				}
			//
		}


		$data = array_merge(self::getDefaultData(), [
														'moduleStep' => $moduleStep,
														'selectData' => $selectData,
														'topLevelDataId' => $topLevelDataId
													]);

		Session::keep('file_id');

		return view('modules.core.add', $data);
	}


	public function insert(Request $request, $moduleAlias, $moduleStepId, $topLevelDataId) {
		$module = Module::firstWhere('alias', $moduleAlias);
		$moduleStep = ModuleStep::find($moduleStepId);
		$id = 0;

		// Image - uploading image without checking it passed validation or not
			foreach($moduleStep->moduleBlock as $data) {
				if($data->type === 'image') {
					if($request->hasFile($data->db_column)) {
						if(!Session::has('file_id')) {
							Session::flash('file_id', rand(1000000,9999999));
						} else {
							Session::reflash();
						}
				
						$id = Session::get('file_id');

						$prefix = '';

						if($data->prefix) {
							$prefix = $data->prefix.'_';
						}
						
						$validator = Validator::make($request->all(), array(
							$data->db_column => 'mimes:jpeg,jpg,png,gif|required|max:10000'
						));
						
						if($validator->fails()) {
							return redirect()->route('coreAdd', [$module->alias, $moduleStep->id])->withErrors($validator)->withInput();
						}

						$request->file($data->db_column)->storeAs('public/images/modules/'.$module->alias.'/'.$moduleStep->id, $prefix.$id.'.'.$data->file_format);	
						
						$imagePath = 'app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$id.'.'.$data->file_format;

						$image = ImageManagerStatic::make(storage_path($imagePath));
						$width = $image->width();
						$height = $image->height();

						if($data->fit_type === 'fit') {
							$image->fit($data->image_width,
											$data->image_height,
											function() {},
											$data->fit_position,
											$data->fit_position_1,
											$data->fit_position_2,
											$data->fit_position_3);
						}
						
						if($data->fit_type === 'resize') {
							$image->resize($data->image_width,
												$data->image_height,
												function ($constraint) {
												$constraint->aspectRatio();
												});
							
							if($width < $data->image_width && $height < $data->image_height) {
								$image = ImageManagerStatic::make(storage_path($imagePath));																																			
							}
						}
						
						if($data->fit_type === 'resize_with_bg') {
							if($width > $data->image_width || $height > $data->image_height) {
								$image->resize($data->image_width,
													$data->image_height,
													function ($constraint) {
													$constraint->aspectRatio();
													});																																	
							}

							$image->resizeCanvas($data->image_width, $data->image_height, 'center', false, '#FFFFFF');
						}

						if($data->fit_type === 'default') {
							$image = ImageManagerStatic::make(storage_path($imagePath));
						}

						$image->save();

						for($i = 1; $i < 4; $i++) {
							if($data->{'prefix_'.$i}) {
								$request->file($data->db_column)->storeAs('public/images/modules/'.$module->alias.'/'.$moduleStep->id, $prefix.$id.'_'.$data->{'prefix_'.$i}.'.'.$data->file_format );

								if($data->{'fit_type_'.$i} === 'fit') {
									$image = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$id.'_'.$data->{'prefix_'.$i}.'.'.$data->file_format))->fit($data->{'image_width_'.$i},
																																															$data->{'image_height_'.$i},
																																															function() {},
																																															$data->{'fit_position_'.$i});
								}
								
								if($data->{'fit_type_'.$i} === 'resize') {
									$image = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$id.'_'.$data->{'prefix_'.$i}.'.'.$data->file_format))->resize($data->{'image_width_'.$i},
																																															$data->{'image_height_'.$i},
																																															function ($constraint) {
																																																$constraint->aspectRatio();
																																															});

									
									$width = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$id.'_'.$data->{'prefix_'.$i}.'.'.$data->file_format))->width();
									$height = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$id.'_'.$data->{'prefix_'.$i}.'.'.$data->file_format))->height();

									if($width < $data->{'image_width_'.$i} && $height < $data->{'image_height_'.$i}) {
										$image = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$id.'_'.$data->{'prefix_'.$i}.'.'.$data->file_format));																																			
									}
								}

								if($data->fit_type === 'resize_with_bg') {
									if($width > $data->{'image_width_'.$i} || $height > $data->{'image_height_'.$i}) {
										$image = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$id.'_'.$data->{'prefix_'.$i}.'.'.$data->file_format))->resize($data->{'image_width_'.$i},
																																																									$data->{'image_height_'.$i},
																																																									function ($constraint) {
																																																									$constraint->aspectRatio();
																																																									});																																	
									}
									
									$image-> resizeCanvas($data->{'image_width_'.$i}, $data->{'image_height_'.$i}, 'center', false, '#FFFFFF');
								}

								if($data->{'fit_type_'.$i} === 'default') {
									$image = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$id.'_'.$data->{'prefix_'.$i}.'.'.$data->file_format));
								}

								$image->save();
							}
						}
					}
				}
			}
		//


		// File - uploading file without checking it passed validation or not
			foreach($moduleStep->moduleBlock as $data) {
				if($data->type === 'file') {
					if($request->hasFile($data->db_column)) {
						if(!Session::has('file_id')) {
							Session::flash('file_id', rand(1000000,9999999));
						} else {
							Session::reflash();
						}
				
						$id = Session::get('file_id');
						
						$prefix = '';

						if($data->prefix) {
							$prefix = $data->prefix.'_';
						}

						$validator = Validator::make($request->all(), array(
							$data->db_column => "required|mimes:".$data->file_format."|max:10000"
						));

						if($validator->fails()) {

							return redirect()->route('coreAdd', array($module->alias, $moduleStep->id, 0))->withErrors($validator)->withInput();
						}
						
						$request->file($data->db_column)->storeAs('public/images/modules/'.$module->alias.'/'.$moduleStep->id, $prefix.$id.'.'.$data->file_format);
					}
				}
			}
		// 


		// Validation
			$validationArray = [];

			foreach($moduleStep->moduleBlock as $data) {
				$prefix = '';

				if($data->prefix) {
					$prefix = $data->prefix.'_';
				}
				
				$imagePath = storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$id.'.'.$data->file_format);
				
				if($data->type === 'image' || $data->type === 'file') {
					if(!file_exists($imagePath)){
						$validationArray[$data->db_column] = $data->validation;
					}
				} elseif($data->type === 'alias') {
					foreach(Language::where('disable', 0)->get() as $langData) {
						$validationArray[$data->db_column.'_'.$langData->title] = $data->validation.'|unique:'.$moduleStep->db_table;
					}
				} else {
					if($data->type !== 'input_with_languages' && $data->type !== 'editor_with_languages') {
						$validationArray[$data->db_column] = $data->validation;
					} else {
						foreach(Language::where('disable', 0)->get() as $langData) {
							$validationArray[$data->db_column.'_'.$langData->title] = $data->validation;
						}
					}
				}
				
			}

			$validator = Validator::make($request->all(), $validationArray);

			if($validator->fails()) {
				return redirect()->route('coreAdd', array($module->alias, $moduleStep->id, $topLevelDataId))->withErrors($validator)->withInput();
			}
		//


		$insertQuery = [];
		
		foreach($moduleStep->moduleBlock as $data) {
			if($data->type !== 'image'
				&& $data->type !== 'file'
				&& $data->type !== 'rang'
				&& $data->type !== 'alias'
				&& $data->type !== 'input_with_languages'
				&& $data->type !== 'editor_with_languages'
				&& $data->type !== 'checkbox'
				&& $data->type !== 'multiply_checkboxes_with_category') {
				$insertQuery[$data->db_column] = (!is_null($request->input($data->db_column)) ? $request->input($data->db_column) : '');
			}
			
			if($data->type === 'alias') {
				foreach(Language::where('disable', 0)->get() as $langData) {
					$value = $request->input($data->db_column.'_'.$langData->title);
					$value = preg_replace("/[^A-ZА-Яა-ჰ0-9 -]+/ui",
											'',
											$value);

					$value = mb_strtolower(trim($value));

					$symbols = array('     ', '    ', '   ', '  ', ' ', '.', ',', '!', '?', '=', '#', '%', '+', '*', '/', '_', '\'', '"');

					$replace_symbols = array('-', '-', '-', '-', '-', '-', '-', '', '-', '-', '', '', '-', '', '-', '-', '', '');

					$value = str_replace($symbols,
											$replace_symbols,
											$value);
											
					$insertQuery[$data->db_column.'_'.$langData->title] = $value;
				}
			}

			if($data->type === 'input_with_languages') {
				foreach(Language::where('disable', 0)->get() as $langData) {
					$insertQuery[$data->db_column.'_'.$langData->title] = $request->input($data->db_column.'_'.$langData->title);
				}
			}

			if($data->type === 'editor_with_languages') {
				foreach(Language::where('disable', 0)->get() as $langData) {
					$insertQuery[$data->db_column.'_'.$langData->title] = $request->input($data->db_column.'_'.$langData->title);
				}
			}

			if($data->type === 'checkbox') {
				$insertQuery[$data->db_column] = (!is_null($request->input($data->db_column)) ? $request->input($data->db_column) : 0);
			}


			$checkboxString = '';

			if($data->type === 'multiply_checkboxes_with_category') {
				if($request->input($data->db_column)) {
					for($i = 0; $i < count($request->input($data->db_column)); $i++) {
						$checkboxString .= $request->input($data->db_column)[$i].',';
					}
				}
				
				$insertQuery[$data->db_column] = $checkboxString;
			}
			

			$multiplyCheckboxString = '';

			if($data->type === 'multiply_checkboxes') {
				if($request->input($data->db_column)) {
					for($i = 0; $i < count($request->input($data->db_column)); $i++) {
						$multiplyCheckboxString .= $request->input($data->db_column)[$i].',';
					}
				}

				$insertQuery[$data->db_column] = $multiplyCheckboxString;
			}
		}
			
		//If table is sorted by rang, insert new row with 5+ more than highest rang
			if($moduleStep->order_by_column === 'rang') {
				$highestRang = DB::table($moduleStep->db_table)->max('rang');
				$highestRang += 5; 
				$insertQuery['rang'] = $highestRang;
			}
		//

		if($topLevelDataId) {
			$insertQuery['top_level'] = $topLevelDataId;
		}

		$insertQuery['created_at'] = date("Y-m-d H:i:s", strtotime('+4 hours'));
		$insertQuery['updated_at'] = date("Y-m-d H:i:s", strtotime('+4 hours'));

		$id = DB::table($moduleStep->db_table)->insertGetId($insertQuery);


		$request->session()->flash('successStatus', __('bsw.successStatus'));

		return redirect()->route('coreEdit', array($module->alias, $moduleStep->id, $id));
	}


	public function addMultImages(Request $request, $moduleAlias, $moduleStepId, $id) {
		$module = Module::where('alias', $moduleAlias)->first();
		$moduleStep = ModuleStep::where('id', $moduleStepId)->orderBy('rang', 'desc')->first();
		$moduleBlocks = ModuleBlock::where([['top_level', $moduleStep->id], ['type', 'image']])->orderBy('rang', 'desc')->first();
		$dataInsertArray = [];

		$validated = $request->validate([
            'images' => 'required',
            'images.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:10000',
        ]);

		if($moduleStep->parent_step_id) {
			$dataInsertArray['top_level'] = $id;
		}

		foreach($request->file('images') as $data) {
			if($moduleStep->order_by_column === 'rang') {
				$highestRang = DB::table($moduleStep->db_table)->max('rang');
				$highestRang += 5; 
				$dataInsertArray['rang'] = $highestRang;
			}
			
			$newRowId = DB::table($moduleStep->db_table)->insertGetId($dataInsertArray);

			$prefix = '';

			if($moduleBlocks->prefix) {
				$prefix = $moduleBlocks->prefix.'_';
			}

			$data->storeAs('public/images/modules/'.$module->alias.'/'.$moduleStep->id, $prefix.$newRowId.'.'.$moduleBlocks->file_format);	
			$imagePath = 'app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$newRowId.'.'.$moduleBlocks->file_format;

			$image = ImageManagerStatic::make(storage_path($imagePath));
			$width = $image->width();
			$height = $image->height();

			if($moduleBlocks->fit_type === 'fit') {
				$image->fit($moduleBlocks->image_width,
								$moduleBlocks->image_height,
								function() {},
								$moduleBlocks->fit_position,
								$moduleBlocks->fit_position_1,
								$moduleBlocks->fit_position_2,
								$moduleBlocks->fit_position_3);
			}
			
			if($moduleBlocks->fit_type === 'resize') {
				$image->resize($moduleBlocks->image_width,
									$moduleBlocks->image_height,
									function ($constraint) {
									$constraint->aspectRatio();
									});
					
				if($width < $moduleBlocks->image_width && $height < $moduleBlocks->image_height) {
					$image = ImageManagerStatic::make(storage_path($imagePath));																																			
				}
			}
			
			if($moduleBlocks->fit_type === 'resize_with_bg') {
				if($width > $moduleBlocks->image_width || $height > $moduleBlocks->image_height) {
					$image->resize($moduleBlocks->image_width,
										$moduleBlocks->image_height,
										function ($constraint) {
										$constraint->aspectRatio();
										});																																	
				}

				$image->resizeCanvas($moduleBlocks->image_width, $moduleBlocks->image_height, 'center', false, '#FFFFFF');
			}

			if($moduleBlocks->fit_type === 'default') {
				$image = ImageManagerStatic::make(storage_path($imagePath));
			}

			$image->save();

			for($i = 1; $i < 4; $i++) {
				if($moduleBlocks->{'prefix_'.$i}) {
					$data->storeAs('public/images/modules/'.$module->alias.'/'.$moduleStep->id, $prefix.$newRowId.'_'.$moduleBlocks->{'prefix_'.$i}.'.'.$moduleBlocks->file_format );

					if($moduleBlocks->{'fit_type_'.$i} === 'fit') {
						$image = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$newRowId.'_'.$moduleBlocks->{'prefix_'.$i}.'.'.$moduleBlocks->file_format))->fit($moduleBlocks->{'image_width_'.$i},
																																												$moduleBlocks->{'image_height_'.$i},
																																												function() {},
																																												$moduleBlocks->{'fit_position_'.$i});
					}
					
					if($moduleBlocks->{'fit_type_'.$i} === 'resize') {
						$image = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$newRowId.'_'.$moduleBlocks->{'prefix_'.$i}.'.'.$moduleBlocks->file_format))->resize($moduleBlocks->{'image_width_'.$i},
																																												$moduleBlocks->{'image_height_'.$i},
																																												function ($constraint) {
																																													$constraint->aspectRatio();
																																												});

						
						$width = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$newRowId.'_'.$moduleBlocks->{'prefix_'.$i}.'.'.$moduleBlocks->file_format))->width();
						$height = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$newRowId.'_'.$moduleBlocks->{'prefix_'.$i}.'.'.$moduleBlocks->file_format))->height();

						if($width < $moduleBlocks->{'image_width_'.$i} && $height < $moduleBlocks->{'image_height_'.$i}) {
							$image = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$newRowId.'_'.$moduleBlocks->{'prefix_'.$i}.'.'.$moduleBlocks->file_format));																																			
						}
					}

					if($moduleBlocks->{'fit_type_'.$i} === 'resize_with_bg') {
						if($width > $moduleBlocks->{'image_width_'.$i} || $height > $moduleBlocks->{'image_height_'.$i}) {
							$image = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$newRowId.'_'.$moduleBlocks->{'prefix_'.$i}.'.'.$moduleBlocks->file_format))->resize($moduleBlocks->{'image_width_'.$i},
																																																						$moduleBlocks->{'image_height_'.$i},
																																																						function ($constraint) {
																																																						$constraint->aspectRatio();
																																																						});																																	
						}
						
						$image-> resizeCanvas($moduleBlocks->{'image_width_'.$i}, $moduleBlocks->{'image_height_'.$i}, 'center', false, '#FFFFFF');
					}

					if($moduleBlocks->{'fit_type_'.$i} === 'default') {
						$image = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$newRowId.'_'.$moduleBlocks->{'prefix_'.$i}.'.'.$moduleBlocks->file_format));
					}

					$image->save();
				}
			}
		}

		$request->session()->flash('successStatus', __('bsw.successAdd'));

		if($moduleStep->parent_step_id) {
			return redirect()->route('coreEdit', array($moduleAlias, $moduleStep->parent_step_id, $id));
		}

		return redirect()->route('coreGetStartPoint', array($moduleAlias));
	}
	

	private function renameTempFiles($moduleStepId, $oldId, $id) {
		$moduleStep = ModuleStep::find($moduleStepId);

		// Image - uploading image without checking it passed validation or not
			foreach($moduleStep->moduleBlock as $data) {
				if($data->type === 'image') {
					$prefix = '';

					if($data->prefix) {
						$prefix = $data->prefix.'_';
					}
					
					$imagePath = 'public/images/modules/'.$moduleStep->module->alias.'/'.$moduleStep->id.'/'.$prefix.$oldId.'.'.$data->file_format;
					
					if(file_exists(storage_path('app/'.$imagePath))) {
						Storage::move($imagePath, 'public/images/modules/'.$moduleStep->module->alias.'/'.$moduleStep->id.'/'.$prefix.$id.'.'.$data->file_format);
					}

					for($i = 1; $i < 4; $i++) {
						$imagePathPrev = 'public/images/modules/'.$moduleStep->module->alias.'/'.$moduleStep->id.'/'.$prefix.$oldId.'_'.$data->{'prefix_'.$i}.'.'.$data->file_format;

						if($data->{'prefix_'.$i}) {
							if(file_exists(storage_path('app/'.$imagePathPrev))) {
								Storage::move($imagePathPrev, 'public/images/modules/'.$moduleStep->module->alias.'/'.$moduleStep->id.'/'.$prefix.$id.'_'.$data->{'prefix_'.$i}.'.'.$data->file_format);
							}
						}
					}
				}
			}
		// 


		// File - uploading file without checking it passed validation or not
			foreach($moduleStep->moduleBlock as $data) {
				if($data->type === 'file') {
					$prefix = '';

					if($data->prefix) {
						$prefix = $data->prefix.'_';
					}

					Storage::move('public/images/modules/'.$moduleStep->module->alias.'/'.$moduleStep->id.'/'.$prefix.$oldId.'.'.$data->file_format,
									'public/images/modules/'.$moduleStep->module->alias.'/'.$moduleStep->id.'/'.$prefix.$id.'.'.$data->file_format);
				}
			}
		// 
	}


	public function edit($moduleAlias, $moduleStepId, $id) {
		// Edit active block part.
			if(Session::has('file_id')) {
				self::renameTempFiles($moduleStepId, Session::get('file_id'), $id);
			}
			

			$module = Module::where('alias', $moduleAlias)->first();
			$moduleStep = ModuleStep::find($moduleStepId);
			$pageData = DB::table($moduleStep->db_table)->find($id);
			$allModuleData = DB::table($moduleStep->db_table)->get();
			

			$activeLang = Language::where('like_default_for_admin', 1)->first();


			$prevId = 0;
			$nextId = 0;

			$prevIdIsSaved = false;
			$nextIdIsSaved = false;


			// Data for bar.
				$parentDataId = 0;

				if($moduleStep->parent_step_id == 0) {
					$pageDataForTagArrows = DB::table($moduleStep->db_table)->orderBy($moduleStep->order_by_column, $moduleStep->order_by_sequence)->get();

					$backRoute = route('coreGetStartPoint', [
						$module->alias
					]);
				} else {
					$parentDataId = $pageData->top_level;

					$pageDataForTagArrows = DB::table($moduleStep->db_table)->where('top_level', $pageData->top_level)->orderBy($moduleStep->order_by_column, $moduleStep->order_by_sequence)->get();

					$backRoute = route('coreEdit', [
						$module->alias,
						$moduleStep->parent_step_id,
						$pageData->top_level
					]);
				}

				foreach($pageDataForTagArrows as $data) {
					if($nextIdIsSaved && !$nextId) {
						$nextId = $data->id;
					}
					
					if($pageData->id === $data->id) {
						$prevIdIsSaved = true;
						$nextIdIsSaved = true;
					}
					
					if(!$prevIdIsSaved) {
						$prevId = $data->id;
					}
				}
			//

			
			$selectData = [];
			$selectOptgroudData = [];
			$multCheckboxCatTable = '';

			foreach($moduleStep->moduleBlock as $data) {
				// Select
					if($data->type === 'select') {
						$selectData[$data->db_column][0] = '-- '.__('bsw.select').' --';

						foreach(DB::table($data->select_table)->orderBy($data->select_sort_by, $data->select_sort_by_text)->get() as $dataInside) {
							$selectData[$data->db_column][$dataInside->{$data->select_search_column}] = $dataInside->{$data->select_option_text};
						}
					}
				// 
				
				// Select with optgroups
					if($data->type === 'select_with_optgroup') {
						$selectOptgroudData[$data->db_column][0] = '-- '.__('bsw.select').' --';
						$alex = array('-- '.__('bsw.select').' --');

						foreach(DB::table($data->select_optgroup_table)->orderBy($data->select_optgroup_sort_by, 'desc')->get() as $dataInside) {
							foreach(DB::table($data->select_optgroup_2_table)->where('top_level', $dataInside->id)->orderBy($data->select_optgroup_2_sort_by, 'desc')->get() as $dataInsideTwice) {
								$alex[$dataInside->{$data->select_optgroup_text}][$dataInsideTwice->id] = $dataInsideTwice->{$data->select_optgroup_2_text};
							}
						}

						$selectOptgroudData[$data->db_column] = $alex;
					}
				// 
				

				// Multiply Checkbox With Category
					$multiplyCheckboxCategory = [];

					if($data->type === 'multiply_checkboxes_with_category') {
						$checkboxTableText = $data->sql_select_with_checkboxes_option_text;														
						$checkboxArray = array();

						foreach(DB::table($data->sql_select_with_checkboxes_table)->orderBy($data->sql_select_with_checkboxes_sort_by, 'desc')->get() as $dataInside) {
							$checkboxTableTextInside = $data->sql_select_with_checkboxes_option_text_inside;
							$tempDbColumn = $data->db_column;
							$tempArray = explode(',', $pageData->$tempDbColumn);

							foreach(DB::table($data->sql_select_with_checkboxes_table_inside)->where('top_level', $dataInside->id)->orderBy($data->sql_select_with_checkboxes_sort_by_inside, 'desc')->get() as $dataInsideTwice) {
								$active = 0;
								foreach($tempArray as $tempData) {
									if($tempData == $dataInsideTwice->id) {
										$active = 1;
									}
								}

								$checkboxArray[$dataInside->$checkboxTableText][$dataInsideTwice->id] = array('title' => $dataInsideTwice->$checkboxTableTextInside, 'active' => $active);
							}
						}

						$multiplyCheckboxCategory[$data->db_column] = $checkboxArray;
					}
				//


				// Multiply Checkbox
					$multiplyCheckbox = [];
					
					if($data->type === 'multiply_checkboxes') {
						$checkboxText = $data->sql_select_with_checkboxes_option_text;														
						$checkboxArray = array();
						$active = 0;

						foreach(DB::table($data->sql_select_with_checkboxes_table)->orderBy($data->sql_select_with_checkboxes_sort_by, 'desc')->get() as $dataInside) {
							$tempDbColumn = $data->db_column;
							$tempArray = explode(',', $pageData->$tempDbColumn);

							foreach($tempArray as $tempData) {
								if($tempData == $dataInside->id) {
									$active = 1;
								}
							}

							$checkboxArray[$dataInside->id] = array('title' => $dataInside->$checkboxText, 'active' => $active);
						}
						
						$multiplyCheckbox[$data->db_column] = $checkboxArray;
					}
				//
			}
		// 


		$nextModuleStep = ModuleStep::where('top_level', $module->id)->where('parent_step_id', $moduleStep->id)->orderBy('rang', 'desc')->get();
		// $nextModuleStep = ModuleStep::where('top_level', $module->id)->orderBy('rang', 'desc')->skip(1)->take(1)->first();
		
		// dd($nextModuleStep);

		$nextModuleStepData = collect([]);

		foreach($nextModuleStep as $data) {
			$nextModuleStepData->add(DB::table($data->db_table)->where('top_level', $pageData->id)->orderBy($data->order_by_column, $data->order_by_sequence)->get());
			
			
			// $moduleBlockForImage = ModuleBlock::where('top_level', $nextModuleStep->id)->where('type', 'image')->first();

			// if($moduleBlockForImage) {
			// 	$imageFormat = $moduleBlockForImage->file_format;
			// }
		}


		$imageFormat = 'jpg'; // Temp solution.
			

		// Tags.
			$tagsData = [];

			$i = 0;

			if($pageData->{ $moduleStep->main_column }) {
				$tagsData[$i]['tagText'] = $pageData->{ $moduleStep->main_column };
			} else {
				$tagsData[$i]['tagText'] = '-- Empty --';
			}
			
			if($moduleStep->parent_step_id != 0) {
				$i++;

				$moduleStepParent0 = ModuleStep::find($moduleStep->parent_step_id);
				$parentModuleStepData0 = DB::table($moduleStepParent0->db_table)->where('id', $pageData->top_level)->first();

				if($parentModuleStepData0->{ $moduleStepParent0->main_column }) {
					$tagsData[$i]['tagText'] = $parentModuleStepData0->{ $moduleStepParent0->main_column };
				} else {
					$tagsData[$i]['tagText'] = '-- Empty --';
				}
				
				$tagsData[$i]['tagUrl'] = route('coreEdit', [$module->alias, $moduleStepParent0->id, $parentModuleStepData0->id]);

				
				if($moduleStepParent0->parent_step_id != 0) {
					$i++;

					$moduleStepParent1 = ModuleStep::find($moduleStepParent0->parent_step_id);
					$parentModuleStepData1 = DB::table($moduleStepParent1->db_table)->where('id', $parentModuleStepData0->top_level)->first();

					if($parentModuleStepData1->{ $moduleStepParent1->main_column }) {
						$tagsData[$i]['tagText'] = $parentModuleStepData1->{ $moduleStepParent1->main_column };
					} else {
						$tagsData[$i]['tagText'] = '-- Empty --';
					}

					$tagsData[$i]['tagUrl'] = route('coreEdit', [$module->alias, $moduleStepParent1->id, $parentModuleStepData1->id]);

					
					if($moduleStepParent1->parent_step_id != 0) {
						$i++;
		
						$moduleStepParent2 = ModuleStep::find($moduleStepParent1->parent_step_id);
						$parentModuleStepData2 = DB::table($moduleStepParent2->db_table)->where('id', $parentModuleStepData1->top_level)->first();
		
						if($parentModuleStepData2->{ $moduleStepParent2->main_column }) {
							$tagsData[$i]['tagText'] = $parentModuleStepData2->{ $moduleStepParent2->main_column };
						} else {
							$tagsData[$i]['tagText'] = '-- Empty --';
						}
						
						$tagsData[$i]['tagUrl'] = route('coreEdit', [$module->alias, $moduleStepParent2->id, $parentModuleStepData2->id]);


						if($moduleStepParent2->parent_step_id != 0) {
							$i++;
			
							$moduleStepParent3 = ModuleStep::find($moduleStepParent3->parent_step_id);
							$parentModuleStepData3 = DB::table($moduleStepParent3->db_table)->where('id', $parentModuleStepData2->top_level)->first();
			
							if($parentModuleStepData3->{ $moduleStepParent3->main_column }) {
								$tagsData[$i]['tagText'] = $parentModuleStepData3->{ $moduleStepParent3->main_column };
							} else {
								$tagsData[$i]['tagText'] = '-- Empty --';
							}
							
							$tagsData[$i]['tagUrl'] = route('coreEdit', [$module->alias, $moduleStepParent3->id, $parentModuleStepData3->id]);
						}
					}
				}
			}

			$i++;

			$tagsData[$i]['tagText'] = $module->title;
			$tagsData[$i]['tagUrl'] = route('coreGetStartPoint', [$module->alias]);

			$tagsData = array_reverse($tagsData);

			// dd($tagsData);
		//
		

		$data = array_merge(self::getDefaultData(), [
														'module' => $module,
														'moduleStep' => $moduleStep,
														'moduleStepData' => DB::table($moduleStep->db_table)->orderBy($moduleStep->order_by_column, $moduleStep->order_by_sequence)->get(),
														'moduleBlocks' => $moduleStep->moduleBlock,
														'selectData' => $selectData,
														'selectOptgroudData' => $selectOptgroudData,
														'languages' => Language::where('disable', 0)->orderBy('rang', 'desc')->get(),
														'sortBy' => $moduleStep->order_by_column,
														'id' => $id,
														'imageFormat' => $imageFormat,
														'nextModuleStep' => $nextModuleStep,
														'nextModuleStepData' => $nextModuleStepData,
														'data' => $pageData,
														'prevId' => $prevId,
														'nextId' => $nextId,
														'multiplyCheckbox' => $multiplyCheckbox,
														'multiplyCheckbox' => $multiplyCheckbox,
														'multiplyCheckboxCategory' => $multiplyCheckboxCategory,
														'tagsData' => $tagsData,
														'backRoute' => $backRoute,
														'parentDataId' => $parentDataId,
														'allModuleData' => $allModuleData,
													]);

		return view('modules.core.edit', $data);
	}


	public function update(Request $request, $moduleAlias, $moduleStepId, $id) {
		$moduleStep = ModuleStep::find($moduleStepId);
		$module = Module::where('alias', $moduleAlias)->first();

		// Image - uploading image without checking it passed validation or not
			foreach($moduleStep->moduleBlock as $data) {
				if($data->type === 'image') {
					if($request->hasFile($data->db_column)) {
						$prefix = '';

						if($data->prefix) {
							$prefix = $data->prefix.'_';
						}
						
						$validator = Validator::make($request->all(), array(
							$data->db_column => 'mimes:jpeg,jpg,png,gif|required|max:10000'
						));
						
						if($validator->fails()) {
							return redirect()->route('coreEdit', array($module->alias, $moduleStep->id, $id))->withErrors($validator)->withInput();
						}

						$request->file($data->db_column)->storeAs('public/images/modules/'.$module->alias.'/'.$moduleStep->id, $prefix.$id.'.'.$data->file_format);	
						
						$imagePath = 'app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$id.'.'.$data->file_format;

						$image = ImageManagerStatic::make(storage_path($imagePath));
						$width = $image->width();
						$height = $image->height();

						if($data->fit_type === 'fit') {
							$image->fit($data->image_width,
											$data->image_height,
											function() {},
											$data->fit_position,
											$data->fit_position_1,
											$data->fit_position_2,
											$data->fit_position_3);
						}
						
						if($data->fit_type === 'resize') {
							$image->resize($data->image_width,
												$data->image_height,
												function ($constraint) {
												$constraint->aspectRatio();
												});
								
							if($width < $data->image_width && $height < $data->image_height) {
								$image = ImageManagerStatic::make(storage_path($imagePath));																																			
							}
						}
						
						if($data->fit_type === 'resize_with_bg') {
							if($width > $data->image_width || $height > $data->image_height) {
								$image->resize($data->image_width,
													$data->image_height,
													function ($constraint) {
													$constraint->aspectRatio();
													});																																	
							}

							$image->resizeCanvas($data->image_width, $data->image_height, 'center', false, '#FFFFFF');
						}

						if($data->fit_type === 'default') {
							$image = ImageManagerStatic::make(storage_path($imagePath));
						}

						$image->save();

						for($i = 1; $i < 4; $i++) {
							if($data->{'prefix_'.$i}) {
								$request->file($data->db_column)->storeAs('public/images/modules/'.$module->alias.'/'.$moduleStep->id, $prefix.$id.'_'.$data->{'prefix_'.$i}.'.'.$data->file_format );

								if($data->{'fit_type_'.$i} === 'fit') {
									$image = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$id.'_'.$data->{'prefix_'.$i}.'.'.$data->file_format))->fit($data->{'image_width_'.$i},
																																															$data->{'image_height_'.$i},
																																															function() {},
																																															$data->{'fit_position_'.$i});
								}
								
								if($data->{'fit_type_'.$i} === 'resize') {
									$image = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$id.'_'.$data->{'prefix_'.$i}.'.'.$data->file_format))->resize($data->{'image_width_'.$i},
																																															$data->{'image_height_'.$i},
																																															function ($constraint) {
																																																$constraint->aspectRatio();
																																															});

									
									$width = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$id.'_'.$data->{'prefix_'.$i}.'.'.$data->file_format))->width();
									$height = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$id.'_'.$data->{'prefix_'.$i}.'.'.$data->file_format))->height();

									if($width < $data->{'image_width_'.$i} && $height < $data->{'image_height_'.$i}) {
										$image = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$id.'_'.$data->{'prefix_'.$i}.'.'.$data->file_format));																																			
									}
								}

								if($data->fit_type === 'resize_with_bg') {
									if($width > $data->{'image_width_'.$i} || $height > $data->{'image_height_'.$i}) {
										$image = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$id.'_'.$data->{'prefix_'.$i}.'.'.$data->file_format))->resize($data->{'image_width_'.$i},
																																																									$data->{'image_height_'.$i},
																																																									function ($constraint) {
																																																									$constraint->aspectRatio();
																																																									});																																	
									}
									
									$image-> resizeCanvas($data->{'image_width_'.$i}, $data->{'image_height_'.$i}, 'center', false, '#FFFFFF');
								}

								if($data->{'fit_type_'.$i} === 'default') {
									$image = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$id.'_'.$data->{'prefix_'.$i}.'.'.$data->file_format));
								}

								$image->save();
							}
						}
					}
				}
			}
		// 


		// File - uploading file without checking it passed validation or not
			foreach($moduleStep->moduleBlock as $data) {
				if($data->type === 'file') {
					if($request->hasFile($data->db_column)) {
						$prefix = '';

						if($data->prefix) {
							$prefix = $data->prefix.'_';
						}

						$validator = Validator::make($request->all(), array(
							$data->db_column => "required|mimes:".$data->file_format."|max:10000"
						));

						if($validator->fails()) {

							return redirect()->route('coreEdit', array($module->alias, $moduleStep->id, $id))->withErrors($validator)->withInput();
						}
						
						$request->file($data->db_column)->storeAs('public/images/modules/'.$module->alias.'/'.$moduleStep->id, $prefix.$id.'.'.$data->file_format);
					}
				}
			}
		// 
		
		
		// Validation
			$validationArray = [];

			foreach($moduleStep->moduleBlock as $data) {
				$prefix = '';

				if($data->prefix) {
					$prefix = $data->prefix.'_';
				}
				
				$imagePath = storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$id.'.'.$data->file_format);
				
				if($data->type === 'image' || $data->type === 'file') {
					if(!file_exists($imagePath)){
						$validationArray[$data->db_column] = $data->validation;
					}
				} elseif($data->type === 'alias') {
					foreach(Language::where('disable', 0)->get() as $langData) {
						$validationArray[$data->db_column.'_'.$langData->title] = $data->validation.'|unique:'.$moduleStep->db_table.','.$data->db_column.'_'.$langData->title.','.$id;
					}
				} else {
					if($data->type !== 'input_with_languages' && $data->type !== 'editor_with_languages') {
						$validationArray[$data->db_column] = $data->validation;
					} else {
						foreach(Language::where('disable', 0)->get() as $langData) {
							$validationArray[$data->db_column.'_'.$langData->title] = $data->validation;
						}
					}
				}
				
			}

			$validator = Validator::make($request->all(), $validationArray);

			if($validator->fails()) {
				return redirect()->route('coreEdit', array($module->alias, $moduleStep->id, $id))->withErrors($validator)->withInput();
			}
		//
		
		$updateQuery = [];
		
		foreach($moduleStep->moduleBlock as $data) {
			if($data->type !== 'image'
				&& $data->type !== 'file'
				&& $data->type !== 'rang'
				&& $data->type !== 'alias'
				&& $data->type !== 'input_with_languages'
				&& $data->type !== 'editor_with_languages'
				&& $data->type !== 'checkbox'
				&& $data->type !== 'multiply_checkboxes_with_category') {
				$updateQuery[$data->db_column] = (!is_null($request->input($data->db_column)) ? $request->input($data->db_column) : '');
			}
			
			if($data->type === 'alias') {
				foreach(Language::where('disable', 0)->get() as $langData) {
					$value = $request->input($data->db_column.'_'.$langData->title);
					$value = preg_replace("/[^A-ZА-Яა-ჰ0-9 -]+/ui",
											'',
											$value);

					$value = mb_strtolower(trim($value));

					$symbols = array('     ', '    ', '   ', '  ', ' ', '.', ',', '!', '?', '=', '#', '%', '+', '*', '/', '_', '\'', '"');

					$replace_symbols = array('-', '-', '-', '-', '-', '-', '-', '', '-', '-', '', '', '-', '', '-', '-', '', '');

					$value = str_replace($symbols,
											$replace_symbols,
											$value);
											
					$updateQuery[$data->db_column.'_'.$langData->title] = $value;
				}
			}

			if($data->type === 'input_with_languages') {
				foreach(Language::where('disable', 0)->get() as $langData) {
					$updateQuery[$data->db_column.'_'.$langData->title] = $request->input($data->db_column.'_'.$langData->title);
				}
			}

			if($data->type === 'editor_with_languages') {
				foreach(Language::where('disable', 0)->get() as $langData) {
					$updateQuery[$data->db_column.'_'.$langData->title] = $request->input($data->db_column.'_'.$langData->title);
				}
			}

			if($data->type === 'checkbox') {
				$updateQuery[$data->db_column] = (!is_null($request->input($data->db_column)) ? $request->input($data->db_column) : 0);
			}


			$checkboxString = '';

			if($data->type === 'multiply_checkboxes_with_category') {
				if($request->input($data->db_column)) {
					for($i = 0; $i < count($request->input($data->db_column)); $i++) {
						$checkboxString .= $request->input($data->db_column)[$i].',';
					}
				}
				
				$updateQuery[$data->db_column] = $checkboxString;
			}
			

			$multiplyCheckboxString = '';

			if($data->type === 'multiply_checkboxes') {
				if($request->input($data->db_column)) {
					for($i = 0; $i < count($request->input($data->db_column)); $i++) {
						$multiplyCheckboxString .= $request->input($data->db_column)[$i].',';
					}
				}

				$updateQuery[$data->db_column] = $multiplyCheckboxString;
			}
		}

		$updateQuery['updated_at'] = date("Y-m-d H:i:s", strtotime('+4 hours'));

		DB::table($moduleStep->db_table)->where('id', $id)->update($updateQuery);


		$request->session()->flash('successStatus', __('bsw.successStatus'));

		return redirect()->route('coreEdit', array($module->alias, $moduleStep->id, $id));
	}


	public function delete($moduleAlias, $moduleStepId, $id) {
		$module = Module::firstWhere('alias', $moduleAlias);
		$moduleStep = ModuleStep::find($moduleStepId);
		
		$modelClass = 'App\Models\\'.$moduleStep->model_name;
		$modelClass::destroy($id);
		

		Session::flash('successDeleteStatus', __('bsw.deleteSuccessStatus'));

		if($moduleStep->parent_step_id == 0) {
			return redirect()->route('coreGetStartPoint', $module->alias);
		} else {
			$activeBlockData = DB::table($moduleStep->db_table)->find($id);

			return redirect()->route('coreEdit',
									[
										$module->alias,
										$moduleStep->parent_step_id,
										$activeBlockData->top_level
									]);
		}
	}


	public function multiDelete(Request $request, $moduleAlias, $moduleStepId, $id, $parentModuleStepId) {
		if($request->input('checkbox')) {
			$module = Module::firstWhere('alias', $moduleAlias);
			$moduleStep = ModuleStep::find($moduleStepId);
			$modelClass = 'App\Models\\'.$moduleStep->model_name;
			
			foreach($request->input('checkbox') as $dataId) {
				$modelClass::destroy($dataId);
			}
	
			Session::flash('successDeleteStatus', __('bsw.deleteSuccessStatus'));
	
			if($id) {
				return redirect()->route('coreEdit', [$moduleAlias, $parentModuleStepId, $id]);
			}
	
			return redirect()->route('coreGetStartPoint', $moduleAlias);
		}

		return back()->with('alert', __('bsw.select_block_delete'));
	}
}