@extends('admin.layouts.master')


@section('pageMetaTitle')
    Modules
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'BSC',
		'tag0Url' => route('bscStartPoint'),
		'tag1Text' => $bsc -> system_word
	])


	@include('admin.includes.bar', [
		'addUrl' => route('bscAdd'),
		'deleteUrl' => route('bscDelete', $bsc -> id),
		'nextId' => $nextBscId,
		'prevId' => $prevBscId,
		'nextRoute' => route('bscEdit', $nextBscId),
		'prevRoute' => route('bscEdit', $prevBscId)
	])


	{{ Form :: model($bsc, array('route' => array('bscUpdate', $bsc -> id))) }}
		<div class="p-2">
			{{ Form :: text('system_word') }}
		</div>

		<div class="p-2">
			{{ Form :: text('configuration') }}
		</div>

		{{ Form :: submit('Submit') }}
	{{ Form :: close() }}
@endsection
