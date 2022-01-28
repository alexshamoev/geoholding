@extends('admin.master')


@section('pageMetaTitle')
    BSC
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'BSC'
	])

	<div class="p-2">
		@include('admin.includes.addButton', ['text' => 'Add Bsc', 'url' => route('bscAdd')])

		@foreach($bscs as $data)
			@include('modules.bsc.admin_panel.includes.horizontalEditDeleteBlock', [
				'title' => $data -> system_word,
				'text' => $data -> configuration,
				'editLink' => route('bscEdit', $data -> id),
				'deleteLink' => route('bscDelete', $data -> id)
			])
		@endforeach
	</div>
@endsection