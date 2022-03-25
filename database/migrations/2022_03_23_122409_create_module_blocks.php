<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleBlocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_blocks', function (Blueprint $table) {
			$table->bigIncrements('id');
			
			$table -> integer('top_level') -> default(0);
			$table -> string('type') -> default('');
			$table -> integer('a_use_for_sort') -> default(0);
			$table -> integer('sort_by_desc') -> default(0);
			$table -> integer('a_use_for_tags') -> default(0);
			$table -> integer('file_possibility_to_delete') -> default(0);
			$table -> integer('image_width') -> default(0);
			$table -> integer('image_height') -> default(0);	
            $table -> string('fit_type') -> default('');
			$table -> integer('image_fill') -> default(0);
			$table -> integer('image_width_1') -> default(0);
			$table -> integer('image_height_1') -> default(0);
            $table -> string('fit_type_1') -> default('');
			$table -> integer('image_fill_1') -> default(0);
			$table -> integer('image_width_2') -> default(0);
			$table -> integer('image_height_2') -> default(0);
            $table -> string('fit_type_2') -> default('');
			$table -> integer('image_fill_2') -> default(0);
			$table -> integer('image_width_3') -> default(0);
			$table -> integer('image_height_3') -> default(0);
            $table -> string('fit_type_3') -> default('');
			$table -> integer('image_fill_3') -> default(0);
			$table -> integer('hide') -> default(0);
			$table -> integer('rang') -> default(0);
			$table -> integer('min_range') -> default(0);
			$table -> integer('max_range') -> default(0);
			$table -> integer('range_step') -> default(0);
			$table -> integer('range_value') -> default(0);
			$table -> string('db_column') -> default('');
			$table -> string('label') -> default('');
			$table -> string('example') -> default('');
			$table -> string('select_table') -> default('');
			$table -> string('select_condition') -> default('');
			$table -> string('select_sort_by') -> default('');
			$table -> string('select_search_column') -> default('');
			$table -> string('select_option_text') -> default('');
			$table -> string('select_optgroup_table') -> default('');
			$table -> string('select_optgroup_sort_by') -> default('');
			$table -> string('select_optgroup_text') -> default('');
			$table -> string('select_option_2_text') -> default('');
			$table -> string('select_optgroup_2_table') -> default('');
			$table -> string('select_optgroup_2_sort_by') -> default('');
			$table -> string('select_optgroup_2_text') -> default('');
			$table -> string('select_active_option') -> default('');
			$table -> string('select_first_option_value') -> default('');
			$table -> string('select_first_option_text') -> default('');
			$table -> string('label_for_ajax_select') -> default('');
			$table -> string('file_folder') -> default('');
			$table -> string('file_title') -> default('');
			$table -> string('file_format') -> default('');
			$table -> string('file_name_index_1') -> default('');
			$table -> string('file_name_index_2') -> default('');
			$table -> string('file_name_index_3') -> default('');
			$table -> string('radio_value') -> default('');
			$table -> string('radio_class') -> default('');
			$table -> string('sql_select_with_checkboxes_table') -> default('');
			$table -> string('sql_select_with_checkboxes_sort_by') -> default('');
			$table -> string('sql_select_with_checkboxes_option_text') -> default('');
			$table -> string('sql_select_with_checkboxes_table_inside') -> default('');
			$table -> string('sql_select_with_checkboxes_sort_by_inside') -> default('');
			$table -> string('sql_select_with_checkboxes_option_text_inside') -> default('');
			$table -> string('params_values_table') -> default('');
			$table -> string('div_id') -> default('');
            $table -> string('select_sort_by_text') -> default('desc');
            $table -> string('validation') -> default('');
            $table -> string('fit_position') -> default('');
            $table -> string('prefix_1') -> default('');
            $table -> string('prefix_2') -> default('');
            $table -> string('prefix_3') -> default('');
            $table -> string('prefix') -> default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_blocks');
    }
}
