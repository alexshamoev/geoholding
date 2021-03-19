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


		$blockTypes = array('input' => 'input',
							'editor' => 'editor',
							'file' => 'file',
							'image' => 'image',
							'select' => 'select',
							'alias' => 'alias',
							'calendar' => 'calendar',
							'color_picker' => 'color_picker',
							'rang' => 'rang',
							'published' => 'published',
							'select_with_optgroup' => 'select_with_optgroup',
							'select_with_ajax' => 'select_with_ajax',
							'checkbox' => 'checkbox',
							'multiply_checkboxes' => 'multiply_checkboxes',
							'multiply_checkboxes_with_category' => 'multiply_checkboxes_with_category',
							'multiply_input_params' => 'multiply_input_params');
		

		return view('modules.modules.admin_panel.edit_step_2', ['modules' => Module :: all(),
																'pages' => Page :: where('published', 1) -> get(),
																'languages' => Language :: where('published', 1) -> get(),
																'module' => $module,
																'moduleSteps' => ModuleStep :: where('top_level', $module -> id) -> get(),
																'moduleBlocks' => ModuleBlock :: where('top_level', $moduleStep -> id) -> get(),
																'moduleStep' => $moduleStep,
																'moduleBlock' => $moduleBlock,
																'blockTypes' => $blockTypes,
																'prev' => ModuleBlock :: find($prevId),
																'next' => ModuleBlock :: find($nextId)]);
	}


	public function update(Request $request, $moduleId, $stepId, $id) {
		$module = Module :: find($moduleId);
		$moduleStep = ModuleStep :: find($stepId);
		$moduleBlock = ModuleBlock :: find($id);

		$moduleBlock -> type = (!is_null($request -> input('type')) ? $request -> input('type') : '');
		$moduleBlock -> db_column = (!is_null($request -> input('db_column')) ? $request -> input('db_column') : '');
		$moduleBlock -> label = (!is_null($request -> input('label')) ? $request -> input('label') : '');
		$moduleBlock -> example = (!is_null($request -> input('example')) ? $request -> input('example') : '');
		$moduleBlock -> check_in_delete_empty = (!is_null($request -> input('check_in_delete_empty')) ? $request -> input('check_in_delete_empty') : 0);
		$moduleBlock -> a_use_for_sort = (!is_null($request -> input('a_use_for_sort')) ? $request -> input('a_use_for_sort') : 0);
		$moduleBlock -> sort_by_desc = (!is_null($request -> input('sort_by_desc')) ? $request -> input('sort_by_desc') : 0);
		$moduleBlock -> a_use_for_tags = (!is_null($request -> input('a_use_for_tags')) ? $request -> input('a_use_for_tags') : 0);
		$moduleBlock -> file_possibility_to_delete = (!is_null($request -> input('file_possibility_to_delete')) ? $request -> input('file_possibility_to_delete') : 0);
		
		$moduleBlock -> image_width = (!is_null($request -> input('image_width')) ? $request -> input('image_width') : 0);
		$moduleBlock -> image_height = (!is_null($request -> input('image_height')) ? $request -> input('image_height') : 0);
		$moduleBlock -> image_cover = (!is_null($request -> input('image_cover')) ? $request -> input('image_cover') : 0);
		$moduleBlock -> image_fill = (!is_null($request -> input('image_fill')) ? $request -> input('image_fill') : 0);

		$moduleBlock -> image_width_1 = (!is_null($request -> input('image_width_1')) ? $request -> input('image_width_1') : 0);
		$moduleBlock -> image_height_1 = (!is_null($request -> input('image_height_1')) ? $request -> input('image_height_1') : 0);
		$moduleBlock -> image_cover_1 = (!is_null($request -> input('image_cover_1')) ? $request -> input('image_cover_1') : 0);
		$moduleBlock -> image_fill_1 = (!is_null($request -> input('image_fill_1')) ? $request -> input('image_fill_1') : 0);

		$moduleBlock -> image_width_2 = (!is_null($request -> input('image_width_2')) ? $request -> input('image_width_2') : 0);
		$moduleBlock -> image_height_2 = (!is_null($request -> input('image_height_2')) ? $request -> input('image_height_2') : 0);
		$moduleBlock -> image_cover_2 = (!is_null($request -> input('image_cover_2')) ? $request -> input('image_cover_2') : 0);
		$moduleBlock -> image_fill_2 = (!is_null($request -> input('image_fill_2')) ? $request -> input('image_fill_2') : 0);

		$moduleBlock -> image_width_3 = (!is_null($request -> input('image_width_3')) ? $request -> input('image_width_3') : 0);
		$moduleBlock -> image_height_3 = (!is_null($request -> input('image_height_3')) ? $request -> input('image_height_3') : 0);
		$moduleBlock -> image_cover_3 = (!is_null($request -> input('image_cover_3')) ? $request -> input('image_cover_3') : 0);
		$moduleBlock -> image_fill_3 = (!is_null($request -> input('image_fill_3')) ? $request -> input('image_fill_3') : 0);

		$moduleBlock -> hide = (!is_null($request -> input('hide')) ? $request -> input('hide') : 0);
		// $moduleBlock -> require = (!is_null($request -> input('require')) ? $request -> input('require') : 0);

		$moduleBlock -> min_range = (!is_null($request -> input('min_range')) ? $request -> input('min_range') : 0);
		$moduleBlock -> max_range = (!is_null($request -> input('max_range')) ? $request -> input('max_range') : 0);
		$moduleBlock -> range_step = (!is_null($request -> input('range_step')) ? $request -> input('range_step') : 0);
		$moduleBlock -> range_value = (!is_null($request -> input('range_value')) ? $request -> input('range_value') : 0);

		$moduleBlock -> select_table = (!is_null($request -> input('select_table')) ? $request -> input('select_table') : '');
		$moduleBlock -> select_condition = (!is_null($request -> input('select_condition')) ? $request -> input('select_condition') : '');
		$moduleBlock -> select_sort_by = (!is_null($request -> input('select_sort_by')) ? $request -> input('select_sort_by') : '');
		$moduleBlock -> select_search_column = (!is_null($request -> input('select_search_column')) ? $request -> input('select_search_column') : '');
		$moduleBlock -> select_option_text = (!is_null($request -> input('select_option_text')) ? $request -> input('select_option_text') : '');
		$moduleBlock -> select_optgroup_table = (!is_null($request -> input('select_optgroup_table')) ? $request -> input('select_optgroup_table') : '');
		$moduleBlock -> select_optgroup_sort_by = (!is_null($request -> input('select_optgroup_sort_by')) ? $request -> input('select_optgroup_sort_by') : '');
		$moduleBlock -> select_optgroup_text = (!is_null($request -> input('select_optgroup_text')) ? $request -> input('select_optgroup_text') : '');
		$moduleBlock -> select_option_2_text = (!is_null($request -> input('select_option_2_text')) ? $request -> input('select_option_2_text') : '');
		$moduleBlock -> select_optgroup_2_table = (!is_null($request -> input('select_optgroup_2_table')) ? $request -> input('select_optgroup_2_table') : '');
		$moduleBlock -> select_optgroup_2_sort_by = (!is_null($request -> input('select_optgroup_2_sort_by')) ? $request -> input('select_optgroup_2_sort_by') : '');
		$moduleBlock -> select_optgroup_2_text = (!is_null($request -> input('select_optgroup_2_text')) ? $request -> input('select_optgroup_2_text') : '');
		$moduleBlock -> select_active_option = (!is_null($request -> input('select_active_option')) ? $request -> input('select_active_option') : '');
		$moduleBlock -> select_first_option_value = (!is_null($request -> input('select_first_option_value')) ? $request -> input('select_first_option_value') : '');
		$moduleBlock -> select_first_option_text = (!is_null($request -> input('select_first_option_text')) ? $request -> input('select_first_option_text') : '');
		$moduleBlock -> label_for_ajax_select = (!is_null($request -> input('label_for_ajax_select')) ? $request -> input('label_for_ajax_select') : '');
		$moduleBlock -> file_folder = (!is_null($request -> input('file_folder')) ? $request -> input('file_folder') : '');
		$moduleBlock -> file_title = (!is_null($request -> input('file_title')) ? $request -> input('file_title') : '');
		$moduleBlock -> file_format = (!is_null($request -> input('file_format')) ? $request -> input('file_format') : '');
		$moduleBlock -> file_name_index_1 = (!is_null($request -> input('file_name_index_1')) ? $request -> input('file_name_index_1') : '');
		$moduleBlock -> file_name_index_2 = (!is_null($request -> input('file_name_index_2')) ? $request -> input('file_name_index_2') : '');
		$moduleBlock -> file_name_index_3 = (!is_null($request -> input('file_name_index_3')) ? $request -> input('file_name_index_3') : '');
		$moduleBlock -> radio_value = (!is_null($request -> input('radio_value')) ? $request -> input('radio_value') : '');
		$moduleBlock -> radio_class = (!is_null($request -> input('radio_class')) ? $request -> input('radio_class') : '');
		$moduleBlock -> sql_select_with_checkboxes_table = (!is_null($request -> input('sql_select_with_checkboxes_table')) ? $request -> input('sql_select_with_checkboxes_table') : '');
		$moduleBlock -> sql_select_with_checkboxes_sort_by = (!is_null($request -> input('sql_select_with_checkboxes_sort_by')) ? $request -> input('sql_select_with_checkboxes_sort_by') : '');
		$moduleBlock -> sql_select_with_checkboxes_option_text = (!is_null($request -> input('sql_select_with_checkboxes_option_text')) ? $request -> input('sql_select_with_checkboxes_option_text') : '');
		$moduleBlock -> sql_select_with_checkboxes_table_inside = (!is_null($request -> input('sql_select_with_checkboxes_table_inside')) ? $request -> input('sql_select_with_checkboxes_table_inside') : '');
		$moduleBlock -> sql_select_with_checkboxes_sort_by_inside = (!is_null($request -> input('sql_select_with_checkboxes_sort_by_inside')) ? $request -> input('sql_select_with_checkboxes_sort_by_inside') : '');
		$moduleBlock -> sql_select_with_checkboxes_option_text_inside = (!is_null($request -> input('sql_select_with_checkboxes_option_text_inside')) ? $request -> input('sql_select_with_checkboxes_option_text_inside') : '');
		$moduleBlock -> params_values_table = (!is_null($request -> input('params_values_table')) ? $request -> input('params_values_table') : '');
		$moduleBlock -> div_id = (!is_null($request -> input('div_id')) ? $request -> input('div_id') : '');


		$moduleBlock -> save();

		return redirect() -> route('moduleBlockEdit', array($module -> id, $moduleStep -> id, $moduleBlock -> id));
	}
	

	public function delete($moduleId, $stepId, $id) {
		ModuleBlock :: destroy($id);

		return redirect() -> route('moduleStepEdit', array($moduleId, $stepId));
	}
}
