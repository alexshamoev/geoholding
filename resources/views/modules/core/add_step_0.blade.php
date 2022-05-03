@extends('admin.master')


@section('pageMetaTitle')
    {{ $moduleStep->moduleLevel->module->title }} > {{ __('bsw.adding') }}
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => $moduleStep->moduleLevel->module->title,
		'tag0Url' => route('coreGetStep0', [$moduleStep->moduleLevel->module->alias]),
		'tag1Text' => __('bsw.adding')
	])

	
	<div class="p-2">
		@if($errors->any())
			<div class="p-2">
				<div class="alert alert-danger m-0">
					{{ __('bsw.warningStatus') }}
				</div>
			</div>
		@endif
	
		
		{{ Form::open(array('route' => array('coreInsertStep0', $moduleStep->moduleLevel->module->alias, $moduleStep->id), 'files' => true)) }}
			@foreach($moduleStep->moduleBlock as $moduleBlock)
				@if($moduleBlock->db_column !== 'rang')
					<div class="p-2">
						@switch($moduleBlock->type)
							@case('input')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock->label }}:

										@php
											if($moduleBlock->validation) {
												echo '*';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form::text($moduleBlock->db_column) }}
									</div>
								</div>

								@break
							@case('image')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock->label }}:

										@php
											if($moduleBlock->validation) {
												echo '*';
											}

											$prefix = '';

											if($moduleBlock->prefix) {
												$prefix = $moduleBlock->prefix.'_';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form::file($moduleBlock->db_column) }}
									</div>

									@if(Session::has('file_id'))
										{{ Session::get('file_id') }}

										@if(file_exists(public_path('/storage/images/modules/'.$moduleStep->moduleLevel->module->alias.'/step_0/'.$prefix.Session::get('file_id').'.'.$moduleBlock->file_format)))
											<div class="p-2">
												<img class="w-25" src="{{ asset('/storage/images/modules/'.$moduleStep->moduleLevel->module->alias.'/step_0/'.$prefix.Session::get('file_id').'.'.$moduleBlock->file_format) }}" alt="">
											</div>
										@endif
									@endif
								</div>

								@break
							@case('file')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock->label }}:

										@php
											if($moduleBlock->validation) {
												echo '*';
											}

											$prefix = '';

											if($moduleBlock->prefix) {
												$prefix = $moduleBlock->prefix.'_';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form::file($moduleBlock->db_column) }}
									</div>
								</div>

								@break
							@case('select')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock->label }}:

										@php
											if($moduleBlock->validation) {
												echo '*';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form::select($moduleBlock->db_column, $selectData[$moduleBlock->db_column]) }}
									</div>
								</div>

								@break
							@case('select_with_optgroup')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock->label }}:

										@php
											if($moduleBlock->validation) {
												echo '*';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form::select($moduleBlock->db_column, $selectOptgroudData[$moduleBlock->db_column]) }}
									</div>
								</div>
								
								@break
							@case('editor')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock->label }}:

										@php
											if($moduleBlock->validation) {
												echo '*';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form::textarea($moduleBlock->db_column,
															'',
															[
																'id' => $moduleBlock->db_column
															]) }}
									</div>
								</div>

								<script>
									ClassicEditor
										.create( document.querySelector( '#{{ $moduleBlock->db_column }}' ) )
										.catch( error => {
											console.error( error );
										} );					
								</script>

								@break
							@case('alias')
								@foreach($languages as $langData)
									<div class="p-2 standard-block">
										<div class="p-2">
											URL Alias:

											@php
												if($moduleBlock->validation) {
													echo '*';
												}
											@endphp

											<img src="{{ asset('/storage/images/modules/languages/'.$langData->id.'.svg') }}" width="30">
										</div>

										<div class="p-2">
											{{ Form::text($moduleBlock->db_column.'_'.$langData->title) }}
										</div>
									</div>

									@error($moduleBlock->db_column.'_'.$langData->title)
										<div class="alert alert-danger">
											{{ $message }}
										</div>
									@enderror
								@endforeach

								@break
							@case('input_with_languages')
								@foreach($languages as $langData)
									<div class="p-2 standard-block">
										<div class="p-2">
											{{ $moduleBlock->label }}:

											@php
												if($moduleBlock->validation) {
													echo '*';
												}
											@endphp

											<img src="{{ asset('/storage/images/modules/languages/'.$langData->id.'.svg') }}" width="30">
										</div>

										<div class="p-2">
											{{ Form::text($moduleBlock->db_column.'_'.$langData->title) }}
										</div>
									</div>

									@error($moduleBlock->db_column.'_'.$langData->title)
										<div class="alert alert-danger">
											{{ $message }}
										</div>
									@enderror
								@endforeach

								@break
							@case('editor_with_languages')
								@foreach($languages as $langData)
									<div class="p-2 standard-block">
										<div class="p-2">
											{{ $moduleBlock->label }}:

											@php
												if($moduleBlock->validation) {
													echo '*';
												}
											@endphp

											<img src="{{ asset('/storage/images/modules/languages/'.$langData->id.'.svg') }}" width="30">
										</div>

										<div class="p-2">
											{{ Form::textarea($moduleBlock->db_column.'_'.$langData->title, 
																'',
																[
																	'id' => $moduleBlock->db_column.'_'.$langData->title
																]) }}
										</div>
									</div>

									@error($moduleBlock->db_column.'_'.$langData->title)
										<div class="alert alert-danger">
											{{ $message }}
										</div>
									@enderror
										
									<script>
										ClassicEditor
											.create( document.querySelector( '#{{$moduleBlock->db_column.'_'.$langData->title}}' ) )
											.catch( error => {
												console.error( error );
											} );					
									</script>
								@endforeach

								@break
							@case('checkbox')
								<div class="p-2 standard-block">
									<div class="p-2">
										<label>
											{{ Form::checkbox($moduleBlock->db_column, 1) }}
											
											{{ $moduleBlock->label }}
										</label>
									</div>
								</div>

								@break
							@case('multiply_checkboxes')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock->label }}:
									</div>

									<div class="p-2">
										@foreach($multiplyCheckbox[$moduleBlock->db_column] as $key => $dataInside)
											{{ Form::checkbox($moduleBlock->db_column.'[]', $key , $dataInside['active']) }}

											{{ $dataInside['title'] }}
										@endforeach
									</div>
								</div>

								@break
							@case('multiply_checkboxes_with_category')
								<div class="p-2 standard-block">
									<div class="p-2">
										@foreach($multiplyCheckboxCategory[$moduleBlock->db_column] as $key => $dataInside)
											{{ $key }}
											<br>
											@foreach($dataInside as $secondKey => $dataInsideTwice)
												{{ Form::checkbox($moduleBlock->db_column.'[]', $secondKey, $dataInsideTwice['active']) }}

												{{ $dataInsideTwice['title'] }}
												<br>
											@endforeach
										@endforeach
									</div>
								</div>

								@break
							@default
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock->label }}:

										@php
											if($moduleBlock->validation) {
												echo '*';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form::text($moduleBlock->db_column) }}
									</div>
								</div>
						@endswitch


						@if($moduleBlock->type !== 'alias' && $moduleBlock->type !== 'input_with_languages' && $moduleBlock->type !== 'editor_with_languages')
							@error($moduleBlock->db_column)
								<div class="alert alert-danger">
									{{ $message }}
								</div>
							@enderror	
						@endif
					</div>
				@endif
			@endforeach

			<div class="p-2 submit-button">
				{{ Form::submit(__('bsw.adding')) }}
			</div>
		{{ Form::close() }}
	</div>
@endsection