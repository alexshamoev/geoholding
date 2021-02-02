@extends('admin.layouts.master')


@section('pageMetaTitle')
    Modules
@endsection


@section('content')
	@include('admin.includes.tags', ['tag0Text' => 'Modules', 'tag0Url' => route('moduleStartPoint')])


	@include('admin.includes.addButton', ['text' => 'Module', 'url' => route('moduleAdd')])


	@foreach($modules as $data)
		@include('admin.includes.horizontalEditDeleteBlock', [
			'title' => $data -> alias,
			'editLink' => route('moduleEdit', $data -> id),
			'deleteLink' => route('moduleDelete', $data -> id)
		])
	@endforeach
@endsection