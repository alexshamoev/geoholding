@extends('admin.master')


@section('pageMetaTitle')
    Modules
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'Modules'
	])

	<div class="p-2">
		@include('admin.includes.addButton', ['text' => 'Add Module', 'url' => route('moduleAdd')])

		<div id="rangBlocks" data-db_table="modules">
			@foreach($modules as $data)
				@include('admin.includes.horizontalEditDeleteBlock', [
					'id' => $data -> id,
					'title' => $data -> alias,
					'editLink' => route('moduleEdit', $data -> id),
					'deleteLink' => route('moduleDelete', $data -> id)
				])
			@endforeach
		</div>
	</div>
@endsection