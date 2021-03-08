@extends('admin.layouts.master')


@section('pageMetaTitle')
    Modules
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'Modules',
		'tag0Url' => route('moduleStartPoint'),
		'tag1Text' => $module -> alias,
		'tag1Url' => route('moduleEdit', $module -> id),
		'tag2Text' => $moduleStep -> title,
		'tag2Url' => route('moduleStepEdit', array($module -> id, $moduleStep -> id)),
		'tag3Text' => $moduleBlock -> db_column
	])


	@include('admin.includes.bar', [
		'addUrl' => route('moduleBlockAdd', array($module -> id, $moduleStep -> id)),
		'deleteUrl' => route('moduleBlockDelete', array($module -> id, $moduleStep -> id, $moduleBlock -> id)),
		'nextId' => 5,
		'prevId' => 5,
		'nextRoute' => route('moduleBlockEdit', array($module -> id, $moduleStep -> id, 6)),
		'prevRoute' => route('moduleBlockEdit', array($module -> id, $moduleStep -> id, 6)),
		'backRoute' => route('moduleStepEdit', array($module -> id, $moduleStep -> id))
	])


	{{ Form :: model($moduleBlock, array('route' => array('moduleBlockUpdate', $module -> id, $moduleStep -> id, $moduleBlock -> id))) }}
		<div class="p-2">
			type
			<br>
			{{ Form :: select('type', $blockTypes) }}
		</div>

		
		<div class="p-2">
			db_column
			<br>
			{{ Form :: text('db_column') }}
		</div>


		<div class="p-2">
			label
			<br>
			{{ Form :: text('label') }}
		</div>


		<div class="p-2">
			example
			<br>
			{{ Form :: text('example') }}
		</div>
		
		
		<div class="p-2">
			<label>
				{{ Form :: checkbox('check_in_delete_empty', '1') }}

				check_in_delete_empty?
			</label>
		</div>

		
		<div class="p-2">
			<label>
				{{ Form :: checkbox('a_use_for_sort', '1') }}

				a_use_for_sort?
			</label>
		</div>

				
		<div class="p-2">
			<label>
				{{ Form :: checkbox('sort_by_desc', '1') }}

				sort_by_desc?
			</label>
		</div>

				
		<div class="p-2">
			<label>
				{{ Form :: checkbox('a_use_for_tags', '1') }}

				a_use_for_tags?
			</label>
		</div>

						
		<div class="p-2">
			<label>
				{{ Form :: checkbox('file_possibility_to_delete', '1') }}

				file_possibility_to_delete?
			</label>
		</div>


		<div class="p-2">
			image_width
			<br>
			{{ Form :: number('image_width') }}
		</div>


		<div class="p-2">
			image_height
			<br>
			{{ Form :: number('image_height') }}
		</div>

		
		<div class="p-2">
			<label>
				{{ Form :: checkbox('image_cover', '1') }}

				image_cover?
			</label>
		</div>

		
		<div class="p-2">
			<label>
				{{ Form :: checkbox('image_fill', '1') }}

				image_fill?
			</label>
		</div>


		<div class="p-2">
			image_width_1
			<br>
			{{ Form :: number('image_width_1') }}
		</div>


		<div class="p-2">
			image_height_1
			<br>
			{{ Form :: number('image_height_1') }}
		</div>

		
		<div class="p-2">
			<label>
				{{ Form :: checkbox('image_cover_1', '1') }}

				image_cover_1?
			</label>
		</div>

		
		<div class="p-2">
			<label>
				{{ Form :: checkbox('image_fill_1', '1') }}

				image_fill_1?
			</label>
		</div>


		<div class="p-2">
			image_width_2
			<br>
			{{ Form :: number('image_width_2') }}
		</div>


		<div class="p-2">
			image_height_2
			<br>
			{{ Form :: number('image_height_2') }}
		</div>

		
		<div class="p-2">
			<label>
				{{ Form :: checkbox('image_cover_2', '1') }}

				image_cover_2?
			</label>
		</div>

		
		<div class="p-2">
			<label>
				{{ Form :: checkbox('image_fill_2', '1') }}

				image_fill_2?
			</label>
		</div>


		<div class="p-2">
			image_width_3
			<br>
			{{ Form :: number('image_width_3') }}
		</div>


		<div class="p-2">
			image_height_3
			<br>
			{{ Form :: number('image_height_3') }}
		</div>

		
		<div class="p-2">
			<label>
				{{ Form :: checkbox('image_cover_3', '1') }}

				image_cover_3?
			</label>
		</div>

		
		<div class="p-2">
			<label>
				{{ Form :: checkbox('image_fill_3', '1') }}

				image_fill_3?
			</label>
		</div>

		
		<div class="p-2">
			<label>
				{{ Form :: checkbox('hide', '1') }}

				hide?
			</label>
		</div>


		<div class="p-2">
			min_range
			<br>
			{{ Form :: number('min_range') }}
		</div>


		<div class="p-2">
			max_range
			<br>
			{{ Form :: number('max_range') }}
		</div>


		<div class="p-2">
			range_step
			<br>
			{{ Form :: number('range_step') }}
		</div>


		<div class="p-2">
			range_value
			<br>
			{{ Form :: number('range_value') }}
		</div>


		<div class="p-2">
			select_table
			<br>
			{{ Form :: text('select_table') }}
		</div>


		<div class="p-2">
			select_condition
			<br>
			{{ Form :: text('select_condition') }}
		</div>


		<div class="p-2">
			select_sort_by
			<br>
			{{ Form :: text('select_sort_by') }}
		</div>


		<div class="p-2">
			select_search_column
			<br>
			{{ Form :: text('select_search_column') }}
		</div>


		<div class="p-2">
			select_option_text
			<br>
			{{ Form :: text('select_option_text') }}
		</div>


		<div class="p-2">
			select_optgroup_table
			<br>
			{{ Form :: text('select_optgroup_table') }}
		</div>


		<div class="p-2">
			select_optgroup_sort_by
			<br>
			{{ Form :: text('select_optgroup_sort_by') }}
		</div>


		<div class="p-2">
			select_optgroup_text
			<br>
			{{ Form :: text('select_optgroup_text') }}
		</div>


		<div class="p-2">
			select_option_2_text
			<br>
			{{ Form :: text('select_option_2_text') }}
		</div>


		<div class="p-2">
			select_optgroup_2_table
			<br>
			{{ Form :: text('select_optgroup_2_table') }}
		</div>


		<div class="p-2">
			select_optgroup_2_sort_by
			<br>
			{{ Form :: text('select_optgroup_2_sort_by') }}
		</div>


		<div class="p-2">
			select_optgroup_2_text
			<br>
			{{ Form :: text('select_optgroup_2_text') }}
		</div>


		<div class="p-2">
			select_active_option
			<br>
			{{ Form :: text('select_active_option') }}
		</div>


		<div class="p-2">
			select_first_option_value
			<br>
			{{ Form :: text('select_first_option_value') }}
		</div>


		<div class="p-2">
			select_first_option_text
			<br>
			{{ Form :: text('select_first_option_text') }}
		</div>


		<div class="p-2">
			label_for_ajax_select
			<br>
			{{ Form :: text('label_for_ajax_select') }}
		</div>


		<div class="p-2">
			file_folder
			<br>
			{{ Form :: text('file_folder') }}
		</div>


		<div class="p-2">
			file_title
			<br>
			{{ Form :: text('file_title') }}
		</div>


		<div class="p-2">
			file_format
			<br>
			{{ Form :: text('file_format') }}
		</div>


		<div class="p-2">
			file_name_index_1
			<br>
			{{ Form :: text('file_name_index_1') }}
		</div>


		<div class="p-2">
			file_name_index_2
			<br>
			{{ Form :: text('file_name_index_2') }}
		</div>


		<div class="p-2">
			file_name_index_3
			<br>
			{{ Form :: text('file_name_index_3') }}
		</div>


		<div class="p-2">
			radio_value
			<br>
			{{ Form :: text('radio_value') }}
		</div>


		<div class="p-2">
			radio_class
			<br>
			{{ Form :: text('radio_class') }}
		</div>


		<div class="p-2">
			sql_select_with_checkboxes_table
			<br>
			{{ Form :: text('sql_select_with_checkboxes_table') }}
		</div>


		<div class="p-2">
			sql_select_with_checkboxes_sort_by
			<br>
			{{ Form :: text('sql_select_with_checkboxes_sort_by') }}
		</div>


		<div class="p-2">
			sql_select_with_checkboxes_option_text
			<br>
			{{ Form :: text('sql_select_with_checkboxes_option_text') }}
		</div>


		<div class="p-2">
			sql_select_with_checkboxes_table_inside
			<br>
			{{ Form :: text('sql_select_with_checkboxes_table_inside') }}
		</div>


		<div class="p-2">
			sql_select_with_checkboxes_sort_by_inside
			<br>
			{{ Form :: text('sql_select_with_checkboxes_sort_by_inside') }}
		</div>


		<div class="p-2">
			sql_select_with_checkboxes_option_text_inside
			<br>
			{{ Form :: text('sql_select_with_checkboxes_option_text_inside') }}
		</div>


		<div class="p-2">
			params_values_table
			<br>
			{{ Form :: text('params_values_table') }}
		</div>


		<div class="p-2">
			div_id
			<br>
			{{ Form :: text('div_id') }}
		</div>


				
		<!-- <div class="p-2">
			<label>
				{{ Form :: checkbox('require', '1') }}

				require?
			</label>
		</div> -->


		{{ Form :: submit('Submit') }}
	{{ Form :: close() }}
@endsection
