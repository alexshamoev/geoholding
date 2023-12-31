@extends('admin.master')


@section('pageMetaTitle')
    BSC
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'BSC'
	])

	<div class="p-2">
		@if(Session :: has('successStatus'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{ Session :: get('successStatus') }}
				</div>
			</div>
		@endif
		

		@include('admin.includes.addButton', ['text' => 'Add Bsc', 'url' => route('bsc.create')])

		@foreach($bscs as $data)
			@include('modules.bsc.admin_panel.includes.horizontalEditDeleteBlock', [
				'title' => $data -> system_word,
				'text' => $data -> configuration,
				'editLink' => route('bsc.edit', $data -> id),
				'deleteLink' => route('bsc.destroy', $data -> id)
			])
		@endforeach
	</div>
@endsection