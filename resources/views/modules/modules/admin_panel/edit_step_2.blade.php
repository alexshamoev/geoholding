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


	@include('admin.includes.bar', [
		'addUrl' => route('moduleBlockAdd', array($module -> id, $moduleStep -> id)),
		'deleteUrl' => route('moduleBlockDelete', array($module -> id, $moduleStep -> id, $moduleBlock -> id)),
		'nextId' => 5,
		'prevId' => 5,
		'nextRoute' => route('moduleBlockEdit', array($module -> id, $moduleStep -> id, 6)),
		'prevRoute' => route('moduleBlockEdit', array($module -> id, $moduleStep -> id, 6)),
		'backRoute' => route('moduleStepEdit', array($module -> id, $moduleStep -> id))
	])


	{{ Form :: model($moduleBlock, array('route' => array('moduleBlockUpdate', $module -> id, $moduleStep -> id, $moduleBlock -> id))) }}
		<div class="p-2">
			db_column
			<br>
			{{ Form :: text('db_column') }}
		</div>


		<div class="p-2">
			label
			<br>
			{{ Form :: text('label') }}
		</div>


		<div class="p-2">
			example
			<br>
			{{ Form :: text('example') }}
		</div>
		
		
		<div class="p-2">
			<label>
				{{ Form :: checkbox('check_in_delete_empty', '1') }}

				check_in_delete_empty?
			</label>
		</div>


		{{ Form :: submit('Submit') }}
	{{ Form :: close() }}
@endsection
