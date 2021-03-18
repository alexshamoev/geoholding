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
			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>type</span>
					</div>
					
					<div class="p-2">
						{{ Form :: select('type', $blockTypes) }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>db_column</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('db_column') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>db_column</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('label') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>example</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('example') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
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
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>image_width</span>
					</div>
					
					<div class="p-2">
						{{ Form :: number('image_width') }}
					</div>
				</div>
			</div>


			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>image_height</span>
					</div>
					
					<div class="p-2">
						{{ Form :: number('image_height') }}
					</div>
				</div>
			</div>

			
			<div class="p-2">
				<div class="standard-block p-2">
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
				</div>
			</div>


			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>image_width_1</span>
					</div>
					
					<div class="p-2">
						{{ Form :: number('image_width_1') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>image_height_1</span>
					</div>
					
					<div class="p-2">
						{{ Form :: number('image_height_1') }}
					</div>
				</div>
			</div>

			
			<div class="p-2">
				<div class="standard-block p-2">
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
				</div>
			</div>


			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>image_width_2</span>
					</div>
					
					<div class="p-2">
						{{ Form :: number('image_width_2') }}
					</div>
				</div>
			</div>


			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>image_height_2</span>
					</div>
					
					<div class="p-2">
						{{ Form :: number('image_height_2') }}
					</div>
				</div>
			</div>

			
			<div class="p-2">
				<div class="standard-block p-2">
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
				</div>
			</div>


			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>image_width_3</span>
					</div>
					
					<div class="p-2">
						{{ Form :: number('image_width_3') }}
					</div>
				</div>
			</div>


			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>image_height_3</span>
					</div>
					
					<div class="p-2">
						{{ Form :: number('image_height_3') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
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
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>min_range</span>
					</div>
					
					<div class="p-2">
						{{ Form :: number('min_range') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>max_range</span>
					</div>
					
					<div class="p-2">
						{{ Form :: number('max_range') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>range_step</span>
					</div>
					
					<div class="p-2">
						{{ Form :: number('range_step') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>range_value</span>
					</div>
					
					<div class="p-2">
						{{ Form :: number('range_value') }}
					</div>
				</div>
			</div>


			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>select_table</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('select_table') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>select_condition</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('select_condition') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>select_sort_by</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('select_sort_by') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>select_search_column</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('select_search_column') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>select_option_text</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('select_option_text') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>select_optgroup_table</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('select_optgroup_table') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>select_optgroup_sort_by</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('select_optgroup_sort_by') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>select_optgroup_text</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('select_optgroup_text') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>select_option_2_text</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('select_option_2_text') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>select_optgroup_2_table</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('select_optgroup_2_table') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>select_optgroup_2_sort_by</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('select_optgroup_2_sort_by') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>select_optgroup_2_text</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('select_optgroup_2_text') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>select_active_option</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('select_active_option') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>select_first_option_value</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('select_first_option_value') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>select_first_option_text</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('select_first_option_text') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>label_for_ajax_select</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('label_for_ajax_select') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>file_folder</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('file_folder') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>file_title</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('file_title') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>file_format</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('file_format') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>file_name_index_1</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('file_name_index_1') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>file_name_index_2</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('file_name_index_2') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>file_name_index_3</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('file_name_index_3') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>radio_value</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('radio_value') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>radio_class</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('radio_class') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>sql_select_with_checkboxes_table</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('sql_select_with_checkboxes_table') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>sql_select_with_checkboxes_sort_by</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('sql_select_with_checkboxes_sort_by') }}
					</div>
				</div>
			</div>
			
			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>sql_select_with_checkboxes_option_text</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('sql_select_with_checkboxes_option_text') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>sql_select_with_checkboxes_table_inside</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('sql_select_with_checkboxes_table_inside') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>sql_select_with_checkboxes_sort_by_inside</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('sql_select_with_checkboxes_sort_by_inside') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>sql_select_with_checkboxes_option_text_inside</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('sql_select_with_checkboxes_option_text_inside') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>params_values_table</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('params_values_table') }}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>div_id</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('div_id') }}
					</div>
				</div>
			</div>


					
			<!-- <div class="p-2">
				<label>
					{{--
						{{ Form :: checkbox('require', '1') }}
					--}}

					require?
				</label>
			</div> -->


			

			<div class="p-2 submit-button">
				{{ Form :: submit('Submit') }}
			</div>
		</div>
	{{ Form :: close() }}
@endsection
