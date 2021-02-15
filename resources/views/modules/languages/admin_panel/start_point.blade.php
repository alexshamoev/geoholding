@extends('admin.layouts.master')


@section('pageMetaTitle')
    Languages
@endsection


@section('content')
	@include('admin.includes.tags', ['tag0Text' => 'Language', 'tag0Url' => route('languageStartPoint')])


	@include('admin.includes.addButton', ['text' => 'Language', 'url' => route('languageAdd')])
	

	@foreach($languages as $data)
		@include('admin.includes.horizontalEditDeleteBlock', [
			'title' => $data -> title,
			'editLink' => route('languageEdit', $data -> id),
			'deleteLink' => route('languageDelete', $data -> id)
		])
	@endforeach
@endsection