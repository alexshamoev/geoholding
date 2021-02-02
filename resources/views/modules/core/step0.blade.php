@extends('admin.layouts.master')


@section('pageMetaTitle')
    Modules
@endsection


@section('content')
	@include('admin.includes.tags', ['tag0Text' => $module -> alias, 'tag0Url' => route('moduleGetData', $module -> alias)])


	@include('admin.includes.addButton', ['text' => $moduleStep -> title, 'url' => route('moduleDataAdd', $module -> alias)])


	@foreach($moduleStepData as $data)
		@include('admin.includes.horizontalEditDeleteBlock', [
			'title' => $data -> alias_ge,
			'editLink' => route('moduleDataEdit', array($module -> alias, $data -> id)),
			'deleteLink' => route('moduleDataDelete', array($module -> alias, $data -> id))
		])
	@endforeach
@endsection