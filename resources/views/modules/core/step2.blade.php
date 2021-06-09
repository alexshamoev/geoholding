@extends('admin.master')


@section('pageMetaTitle')
    Modules
@endsection

@section('content')

	@include('admin.includes.tags', [
		'tag0Text' => $module -> title,
		'tag0Url' => route('coreGetStep0', $module -> alias),
		'tag1Text' => $parentData -> title_ge,
		'tag1Url' => route('coreEditStep0', [$module -> alias, $data -> parent]),
		'tag2Text' => $data -> $use_for_tags
	])
    
	@include('admin.includes.bar', [
		'addUrl' => route('coreAddStep1', [$module -> alias, $data -> parent]),
		'deleteUrl' => route('coreDeleteStep1', array($module -> alias, $data -> parent, $data -> id)),
		'nextId' => $nextId,
		'prevId' => $prevId,
		'nextRoute' => route('coreEditStep1', [$module -> alias, $data -> parent, $nextId]),
		'prevRoute' => route('coreEditStep1', [$module -> alias, $data -> parent, $prevId]),
		'backRoute' => route('coreEditStep0', [$module -> alias, $data -> parent])
	])

    
	<div class="p-2">

		{{ Form :: open(array('route' => array('coreUpdateStep1', $module -> alias, $data -> parent, $data -> id))) }}
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
										{{ Form :: select($moduleBlock -> db_column, $selectOptgroudData[$moduleBlock -> db_column]) }}
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

		@include('admin.includes.addButton', [
			'text' => $bsw -> a_add.' '.$moduleStep2 -> title,
			'url' => route('coreAddStep2', array($module -> alias, $data -> parent, $data -> id))
		])

		<div id="rangBlocks" data-db_table="{{ $moduleStep2 -> db_table }}">
			@foreach($moduleStepTableData2 as $dataIn)
				@if($sortBy === 'rang')
					@include('admin.includes.horizontalEditDeleteBlock', [
						'id' => $dataIn -> id,
						'title' => $dataIn -> $use_for_tags,
						'editLink' => route('coreEditStep2', array($module -> alias, $data -> parent, $dataIn -> parent, $dataIn -> id)),
						'deleteLink' => route('coreDeleteStep2', array($module -> alias, $data -> parent, $dataIn -> parent, $dataIn -> id))
					])
				@else 
					@include('admin.includes.horizontalEditDelete', [
							'id' => $dataIn -> id,
							'title' => $dataIn -> $use_for_tags,
							'editLink' => route('coreEditStep2', array($module -> alias, $data -> parent, $dataIn -> parent, $dataIn -> id)),
							'deleteLink' => route('coreDeleteStep2', array($module -> alias, $data -> parent, $dataIn -> parent, $dataIn -> id))
					])
				@endif
			@endforeach
		</div>
	</div>
@endsection