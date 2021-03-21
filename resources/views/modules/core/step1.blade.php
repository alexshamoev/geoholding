@extends('admin.layouts.master')


@section('pageMetaTitle')
    Modules
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => $module -> alias,
		'tag0Url' => route('moduleGetData', $module -> alias),
		'tag1Text' => $data -> id
	])


	@include('admin.includes.bar', [
		'addUrl' => route('moduleDataAdd', $module -> alias),
		'deleteUrl' => route('moduleDataDelete', array($module -> alias, $data -> id)),
		'nextId' => $nextId,
		'prevId' => $prevId,
		'nextRoute' => route('moduleDataEdit', [$module -> alias, $nextId]),
		'prevRoute' => route('moduleDataEdit', [$module -> alias, $prevId]),
		'backRoute' => route('moduleGetData', $module -> alias)
	])


	{{ Form :: open(array('route' => array('moduleDataUpdate', $module -> alias, $data -> id))) }}
		@foreach($moduleBlocks as $moduleBlock)
			@if($moduleBlock -> db_column !== 'published' && $moduleBlock -> db_column !== 'rang')
				@php
					$tempVar = $moduleBlock -> db_column;
				@endphp

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
			@endif
		@endforeach

		{{ Form :: submit('Submit') }}
	{{ Form :: close() }}
@endsection