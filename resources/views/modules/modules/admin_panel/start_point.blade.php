@extends('admin.master')


@section('pageMetaTitle')
    Modules
@endsection


@section('content')
	@include('admin.includes.tags', ['tag0Text' => 'Modules', 'tag0Url' => route('moduleStartPoint')])

	<div class="p-2">
		@include('admin.includes.addButton', ['text' => 'Add Module', 'url' => route('moduleAdd')])

		<div id="draggablePanelList">
			@foreach($modules as $data)
				@include('admin.includes.horizontalEditDeleteBlock', [
					'title' => $data -> alias,
					'editLink' => route('moduleEdit', $data -> id),
					'deleteLink' => route('moduleDelete', $data -> id)
				])
			@endforeach
		</div>
	</div>
@endsection