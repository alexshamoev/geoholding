@extends('admin.master')


@section('pageMetaTitle')
    Modules
@endsection

@section('content')

    @include('admin.includes.tags', [
		'tag0Text' => $module -> title,
		'tag0Url' => route('coreGetStep0', $module -> alias),
		'tag1Text' => $parentData -> title_ge,
		'tag1Url' => route('coreEditStep0', [$module -> alias, $parentFirst]),
		'tag2Text' => $parentDataSecond -> title_ge,
        'tag2Url' => route('coreEditStep1', [$module -> alias, $parentFirst, $parentSecond]),
        'tag3Text' => $parentDataThird -> title_ge,
        'tag3Url' => route('coreEditStep2', [$module -> alias, $parentFirst, $parentSecond, $parentThird]),
        'tag4Text' => $data -> title_ge
	])

	@include('admin.includes.bar', [
		'addUrl' => route('coreAddStep3', [$module -> alias, $parentFirst, $parentSecond, $parentThird, $id]),
		'deleteUrl' => route('coreDeleteStep3', array($module -> alias, $parentFirst, $parentSecond, $parentThird, $data -> id)),
		'nextId' => $nextId,
		'prevId' => $prevId,
		'nextRoute' => route('coreEditStep3', [$module -> alias, $parentFirst, $parentSecond, $parentThird, $nextId]),
		'prevRoute' => route('coreEditStep3', [$module -> alias, $parentFirst, $parentSecond, $parentThird, $prevId]),
		'backRoute' => route('coreEditStep2', [$module -> alias, $parentFirst, $parentSecond, $parentThird])
	])

    <div class="p-2">
		{{ Form :: open(array('route' => array('coreUpdateStep3', $module -> alias, $parentFirst, $parentSecond, $parentThird, $id))) }}
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
    </div>

@endsection