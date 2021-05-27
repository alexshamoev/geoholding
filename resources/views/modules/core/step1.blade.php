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

		<div id="rangBlocks" data-db_table="{{ $moduleStep1Data -> db_table }}">
			@foreach($moduleStepTableData as $data)
				@if($sortBy === 'rang')
					@include('admin.includes.horizontalEditDeleteBlock', [
						'id' => $data -> id,
						'title' => $data -> $use_for_tags,
						'editLink' => route('coreEditStep0', array($module -> alias, $data -> id)),
						'deleteLink' => route('coreDeleteStep0', array($module -> alias, $data -> id))
					])
				@else 
					@include('admin.includes.horizontalEditDelete', [
							'id' => $id,
							'title' => $data -> $use_for_tags,
							'editLink' => route('coreEditStep0', array($module -> alias, $data -> id)),
							'deleteLink' => route('coreDeleteStep0', array($module -> alias, $data -> id))
					])
				@endif
			@endforeach
		</div>

		<!-- {{ $id }} -->
		<!-- {{ $moduleStep1Data -> db_table }}> -->

	</div>
@endsection