@extends('admin.layouts.master')


@section('pageMetaTitle')
    BSC
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'BSC',
		'tag0Url' => route('bscStartPoint'),
		'tag0ArrowData' => $bscs
	])

	<div class="p-2">
		@include('admin.includes.addButton', ['text' => 'Add Bsc', 'url' => route('bscAdd')])

		@foreach($bscs as $data)
			@include('admin.includes.horizontalEditDeleteBlock', [
				'title' => $data -> system_word,
				'text' => $data -> configuration,
				'editLink' => route('bscEdit', $data -> id),
				'deleteLink' => route('bscDelete', $data -> id)
			])
		@endforeach
	</div>
@endsection