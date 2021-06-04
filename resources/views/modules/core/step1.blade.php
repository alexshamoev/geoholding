@extends('admin.master')


@section('pageMetaTitle')
    Modules
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


	<div class="p-2">

		{{ Form :: open(array('route' => array('coreUpdateStep0', $module -> alias, $data -> id))) }}
			@foreach($moduleBlocks as $moduleBlock)
				@if($moduleBlock -> db_column !== 'published' && $moduleBlock -> db_column !== 'rang')
					@php
						$tempVar = $moduleBlock -> db_column;
					@endphp

					<div class="p-2">
						@switch($moduleBlock -> type)
							@case('input')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock -> label }}
									</div>

									<div class="p-2">
										{{ Form :: text($moduleBlock -> db_column, $data -> $tempVar) }}
									</div>
								</div>

								@break
							@case('select')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock -> label }}
									</div>

									<div class="p-2">
										{{ Form :: select($moduleBlock -> db_column, $selectData[$moduleBlock -> db_column], $data -> $tempVar) }}
									</div>
								</div>

								@break
							@case('select_with_optgroup')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock -> label }}
									</div>

									<div class="p-2">
										{{ Form :: select($moduleBlock -> db_column, $selectOptgroudData[$moduleBlock -> db_column], $data -> $tempVar) }}
									</div>
								</div>
								
								@break

							@case('editor')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock -> label }}
									</div>

									<div class="p-2">
										{{ Form :: textarea($moduleBlock -> db_column, $data -> $tempVar) }}
									</div>
								</div>

								@break
								@case('alias')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock -> label }}
									</div>

									<div class="p-2">
										{{ Form :: text($moduleBlock -> db_column, $data -> $tempVar) }}
									</div>
								</div>

								@break
								@case('checkbox')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock -> label }}
									</div>

									<div class="p-2">
										{{ Form::checkbox($moduleBlock -> db_column, 1, $data -> $tempVar) }}
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
									{{ print_r($multiplyCheckbox[$moduleBlock -> db_column]) }}
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
									</div>

									<div class="p-2">
										{{ Form :: text($moduleBlock -> db_column, $data -> $tempVar) }}
									</div>
								</div>
						@endswitch
					</div>
				@endif
			@endforeach

			<div class="p-2">
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