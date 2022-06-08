@extends('admin.master')


@section('pageMetaTitle')
    Modules
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'Modules'
	])

	<div class="p-2">
		@if(Session :: has('successStatus'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{ Session :: get('successStatus') }}
				</div>
			</div>
		@endif


		@include('admin.includes.addButton', ['text' => 'Add Module', 'url' => route('moduleInsert')])

		<div class="rangBlocks" data-db_table="modules">
			@foreach($modules as $data)
				@include('admin.includes.infoBlockWithoutImage', [
					'id' => $data -> id,
					'title' => $data -> alias,
					'editLink' => route('moduleEdit', $data -> id),
					'deleteLink' => route('moduleDelete', $data -> id),
					'possibilityToDelete' => true,
					'possibilityToEdit' => true,
					'possibilityToRang' => true,
				])
			@endforeach
		</div>
	</div>
@endsection