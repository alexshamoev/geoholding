@extends('admin.master')


@section('pageMetaTitle')
    {{ $module -> title }}
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => $module -> title,
		'tag0Url' => route('coreGetStep0', $module -> alias),
		'tag1Text' => $data -> $use_for_tags
	])


	@include('admin.includes.bar', [
		'addUrl' => route('coreAddStep0', $module -> alias),
		'deleteUrl' => route('coreDeleteStep0', array($module -> alias, $data -> id)),
		'nextId' => $nextId,
		'prevId' => $prevId,
		'nextRoute' => route('coreEditStep0', [$module -> alias, $nextId]),
		'prevRoute' => route('coreEditStep0', [$module -> alias, $prevId]),
		'backRoute' => route('coreGetStep0', $module -> alias)
	])
	
	
	@if($errors -> any())
		<div class="alert alert-danger">
			Whoops, looks like something went wrong
		</div>
	@endif
	
	
	@if(Session :: has('successStatus'))
		<div class="alert alert-success" role="alert">
			{{ Session :: get('successStatus') }}
		</div>
	@endif

	
	<div class="p-2">
		{{ Form :: open(array('route' => array('coreUpdateStep0', $module -> alias, $data -> id), 'files' => true)) }}
			@foreach($moduleBlocks as $moduleBlock)
				@if($moduleBlock -> db_column !== 'published' && $moduleBlock -> db_column !== 'rang')
					<div class="p-2">
						@switch($moduleBlock -> type)
							@case('input')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock -> label }}

										@php
											if($moduleBlock -> validation) {
												echo '*';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form :: text($moduleBlock -> db_column, $data -> { $moduleBlock -> db_column }) }}
									</div>
								</div>

								@break
							@case('image')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock -> label }}

										@php
											if($moduleBlock -> validation) {
												echo '*';
											}

											$prefix = '';

											if($moduleBlock -> prefix) {
												$prefix = $moduleBlock -> prefix.'_';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form :: file($moduleBlock -> db_column) }}
									</div>
									
									<img class="w-25" src="{{ asset('/storage/images/modules/'.$module -> alias.'/step_0/'.$prefix.$data -> id.'.'.$moduleBlock -> file_format) }}" alt="">
								</div>

								@break
							@case('file')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock -> label }}

										@php
											if($moduleBlock -> validation) {
												echo '*';
											}

											$prefix = '';

											if($moduleBlock -> prefix) {
												$prefix = $moduleBlock -> prefix.'_';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form :: file($moduleBlock -> db_column) }}
									</div>
								</div>

								@break
							@case('select')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock -> label }}

										@php
											if($moduleBlock -> validation) {
												echo '*';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form :: select($moduleBlock -> db_column, $selectData[$moduleBlock -> db_column], $data -> { $moduleBlock -> db_column }) }}
									</div>
								</div>

								@break
							@case('select_with_optgroup')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock -> label }}

										@php
											if($moduleBlock -> validation) {
												echo '*';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form :: select($moduleBlock -> db_column, $selectOptgroudData[$moduleBlock -> db_column], $data -> { $moduleBlock -> db_column }) }}
									</div>
								</div>
								
								@break
							@case('editor')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock -> label }}

										@php
											if($moduleBlock -> validation) {
												echo '*';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form :: textarea($moduleBlock -> db_column,
															$data -> { $moduleBlock -> db_column },
															[
																'id' => $moduleBlock -> db_column
															]) }}
									</div>
								</div>

								<script>
									ClassicEditor
										.create( document.querySelector( '#{{ $moduleBlock -> db_column }}' ) )
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
												if($moduleBlock -> validation) {
													echo '*';
												}
											@endphp

											<img src="{{ asset('/storage/images/modules/languages/'.$langData -> id.'.svg') }}" width="30" height="30">
										</div>

										<div class="p-2">
											{{ Form :: text($moduleBlock -> db_column.'_'.$langData -> title,  $data -> { $moduleBlock -> db_column.'_'.$langData -> title }) }}
										</div>
									</div>

									@error($moduleBlock -> db_column.'_'.$langData -> title)
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
											{{ $moduleBlock -> label }}:

											@php
												if($moduleBlock -> validation) {
													echo '*';
												}
											@endphp

											<img src="{{ asset('/storage/images/modules/languages/'.$langData -> id.'.svg') }}" width="30" height="30">
										</div>

										<div class="p-2">
											{{ Form :: text($moduleBlock -> db_column.'_'.$langData -> title,  $data -> { $moduleBlock -> db_column.'_'.$langData -> title }) }}
										</div>
									</div>

									@error($moduleBlock -> db_column.'_'.$langData -> title)
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
											{{ $moduleBlock -> label }}:

											@php
												if($moduleBlock -> validation) {
													echo '*';
												}
											@endphp

											<img src="{{ asset('/storage/images/modules/languages/'.$langData -> id.'.svg') }}" width="30" height="30">
										</div>

										<div class="p-2">
											{{ Form :: textarea($moduleBlock -> db_column.'_'.$langData -> title, 
																$data -> { $moduleBlock -> db_column.'_'.$langData -> title },
																[
																	'id' => $moduleBlock -> db_column.'_'.$langData -> title
																]) }}
										</div>
									</div>

									@error($moduleBlock -> db_column.'_'.$langData -> title)
										<div class="alert alert-danger">
											{{ $message }}
										</div>
									@enderror
										
									<script>
										ClassicEditor
											.create( document.querySelector( '#{{$moduleBlock -> db_column.'_'.$langData -> title}}' ) )
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
											{{ Form :: checkbox($moduleBlock -> db_column, 1, $data -> { $moduleBlock -> db_column }) }}
											
											{{ $moduleBlock -> label }}
										</label>
									</div>
								</div>

								@break
							@case('multiply_checkboxes')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock -> label }}
									</div>

									<div class="p-2">
										@foreach($multiplyCheckbox[$moduleBlock -> db_column] as $key => $dataInside)
											{{ Form::checkbox($moduleBlock -> db_column.'[]', $key , $dataInside['active']) }}

											{{ $dataInside['title'] }}
										@endforeach
									</div>
								</div>

								@break
							@case('multiply_checkboxes_with_category')
								<div class="p-2 standard-block">
									<div class="p-2">
										@foreach($multiplyCheckboxCategory[$moduleBlock -> db_column] as $key => $dataInside)
											{{ $key }}
											<br>
											@foreach($dataInside as $secondKey => $dataInsideTwice)
												{{ Form :: checkbox($moduleBlock -> db_column.'[]', $secondKey, $dataInsideTwice['active']) }}

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
										{{ $moduleBlock -> label }}

										@php
											if($moduleBlock -> validation) {
												echo '*';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form :: text($moduleBlock -> db_column, $data -> { $moduleBlock -> db_column }) }}
									</div>
								</div>
						@endswitch


						@if($moduleBlock -> type !== 'alias' && $moduleBlock -> type !== 'input_with_languages' && $moduleBlock -> type !== 'editor_with_languages')
							@error($moduleBlock -> db_column)
								<div class="alert alert-danger">
									{{ $message }}
								</div>
							@enderror	
						@endif
					</div>
				@endif
			@endforeach

			<div class="p-2 submit-button">
				{{ Form :: submit('მონაცემების შეცვლა') }}
			</div>
		{{ Form :: close() }}
		
		
		@if($nextModuleStepData)
			<div class="p-3"></div>

			@include('admin.includes.addButton', [
				'text' => $bsw -> a_add.' '.$moduleStep -> title,
				'url' => route('coreAddStep1', array($module -> alias, $data -> id))
			])
			

			<div class="row" id="rangBlocks" data-db_table="{{ $moduleStep -> db_table }}">
				@if(!$moduleStep -> images)
					@foreach($nextModuleStepData as $dataIn)
						@if($sortBy === 'rang')
							@include('admin.includes.horizontalEditDeleteBlock', [
								'id' => $dataIn -> id,
								'title' => $dataIn -> $use_for_tags,
								'editLink' => route('coreEditStep1', array($module -> alias, $data -> id, $dataIn -> id)),
								'deleteLink' => route('coreDeleteStep0', array($module -> alias, $dataIn -> id))
							])
						@else 
							@include('admin.includes.horizontalEditDelete', [
									'id' => $dataIn -> id,
									'title' => $dataIn -> $use_for_tags,
									'editLink' => route('coreEditStep1', array($module -> alias, $data -> id, $dataIn -> id)),
									'deleteLink' => route('coreDeleteStep0', array($module -> alias, $dataIn -> id))
							])
						@endif
					@endforeach
				@else
					@foreach($nextModuleStepData as $dataIn)
						@if($sortBy === 'rang')
							@include('admin.includes.verticalEditDeleteBlockWithRangs', [
											'id' => $dataIn -> id,
											'title' => $dataIn -> $use_for_tags,
											'imageUrl' => 'storage/images/modules/'.$module -> alias.'/step_1/'.$dataIn -> id.'.'.$imageFormat,
											'editLink' => route('coreEditStep1', array($module -> alias, $data -> id, $dataIn -> id)),
											'deleteLink' => route('coreDeleteStep0', array($module -> alias, $dataIn -> id))
										])
						@else
							@include('admin.includes.verticalEditDeleteBlock', [
											'id' => $dataIn -> id,
											'title' => $dataIn -> $use_for_tags,
											'imageUrl' => 'storage/images/modules/'.$module -> alias.'/step_1/'.$dataIn -> id.'.'.$imageFormat,
											'moduleAlias' => $module -> alias,
											'editLink' => route('coreEditStep1', array($module -> alias, $data -> id, $dataIn -> id)),
											'deleteLink' => route('coreDeleteStep0', array($module -> alias, $dataIn -> id))
										])
						@endif
					@endforeach
				@endif
			</div>
		@endif
	</div>
@endsection