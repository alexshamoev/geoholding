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


	<div class="col-2">
		<a href="{{ route('moduleBlockAdd', array($module -> id, $moduleStep -> id)) }}">
			Add Step
		</a>
	</div>

    <div class="col-2">
		<a href="{{ route('moduleBlockDelete', array($module -> id, $moduleStep -> id, $moduleBlock -> id)) }}">
			Delete
		</a>
	</div>


	<div class="p-2">
		@if($prev)
			<a href="{{ route('moduleBlockEdit', array($module -> id, $moduleStep -> id, $prev -> id)) }}">
				Prev
			</a>
		@else
			Prev
		@endif

		@if($next)
			<a href="{{ route('moduleBlockEdit', array($module -> id, $moduleStep -> id, $next -> id)) }}">
				Next
			</a>
		@else
			Next
		@endif
	</div>


	{{ Form :: model($moduleBlock, array('route' => array('moduleBlockUpdate', $module -> id, $moduleStep -> id, $moduleBlock -> id))) }}
		<div class="p-2">
			db_column
			<br>
			{{ Form :: text('db_column') }}
		</div>

		{{ Form :: submit('Submit') }}
	{{ Form :: close() }}
@endsection
