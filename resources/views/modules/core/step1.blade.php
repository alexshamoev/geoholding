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
		'nextId' => 3,
		'prevId' => 3,
		'nextRoute' => route('moduleEdit', 3),
		'prevRoute' => route('moduleEdit', 3),
		'backRoute' => route('moduleGetData', $module -> alias)
	])


	<!-- <a href="{{ route('moduleDataAdd', $module -> alias) }}">
		Add {{ $moduleStep -> title }}
	</a> -->


	{{ Form :: open(array('route' => array('moduleDataUpdate', $module -> alias, $data -> id))) }}
		@foreach($moduleBlocks as $moduleBlock)
			@php
				$tempVar = $moduleBlock -> db_column;
			@endphp

			<div class="p-2">
				{{ $moduleBlock -> label }}
				<br>
				{{ Form :: text($moduleBlock -> db_column, $data -> $tempVar) }}
			</div>
		@endforeach

		{{ Form :: submit('Submit') }}
	{{ Form :: close() }}
@endsection