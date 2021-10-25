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
	
	
	@if($errors->any())
		<div class="alert alert-danger">
			Some error
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
										@endphp
									</div>

									<div class="p-2">
										{{ Form :: file('image') }}
									</div>

									<img class="w-25" src="{{ asset('/images/modules/'.$module -> alias.'/'.$data -> id.'.jpg') }}" alt="">
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
										{{ Form :: textarea($moduleBlock -> db_column, $data -> { $moduleBlock -> db_column }) }}
									</div>
								</div>

								<script>
									CKEDITOR.replace('{{ $moduleBlock -> db_column }}');
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

											<img src="{{ asset('/images/modules/languages/admin/'.$langData -> id.'.svg') }}" width="30" height="30">
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

											<img src="{{ asset('/images/modules/languages/admin/'.$langData -> id.'.svg') }}" width="30" height="30">
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

											<img src="{{ asset('/images/modules/languages/admin/'.$langData -> id.'.svg') }}" width="30" height="30">
										</div>

										<div class="p-2">
											{{ Form :: textarea($moduleBlock -> db_column.'_'.$langData -> title,  $data -> { $moduleBlock -> db_column.'_'.$langData -> title }) }}
										</div>
									</div>

									@error($moduleBlock -> db_column.'_'.$langData -> title)
										<div class="alert alert-danger">
											{{ $message }}
										</div>
									@enderror

									<script>
										CKEDITOR.replace('{{ $moduleBlock -> db_column.'_'.$langData -> title }}');
									</script>
								@endforeach

								@break
							@case('checkbox')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock -> label }}
									</div>

									<div class="p-2">
										{{ Form::checkbox($moduleBlock -> db_column, 1, $data -> { $moduleBlock -> db_column }) }}
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
				{{ Form :: submit('Submit') }}
			</div>
		{{ Form :: close() }}
		
		
		@if($moduleStepTableData)
			@include('admin.includes.addButton', [
				'text' => $bsw -> a_add.' '.$moduleStep -> title,
				'url' => route('coreAddStep1', array($module -> alias, $data -> id))
			])

			<div id="rangBlocks" data-db_table="{{ $moduleStep1Data -> db_table }}">
				@foreach($moduleStepTableData as $dataIn)
					@if($sortBy === 'rang')
						@include('admin.includes.horizontalEditDeleteBlock', [
							'id' => $dataIn -> id,
							'title' => $dataIn -> $use_for_tags,
							'editLink' => route('coreEditStep1', array($module -> alias, $data -> id, $dataIn -> id)),
							'deleteLink' => route('coreDeleteStep1', array($module -> alias, $data -> id, $dataIn -> id))
						])
					@else 
						@include('admin.includes.horizontalEditDelete', [
								'id' => $dataIn -> id,
								'title' => $dataIn -> $use_for_tags,
								'editLink' => route('coreEditStep1', array($module -> alias, $data -> id, $dataIn -> id)),
								'deleteLink' => route('coreDeleteStep1', array($module -> alias, $data -> id, $dataIn -> id))
						])
					@endif
				@endforeach
			</div>
		@endif
	</div>
@endsection