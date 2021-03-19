@extends('admin.layouts.master')


@section('pageMetaTitle')
    Languages
@endsection


@section('content')
	@include('admin.includes.tags', ['tag0Text' => 'Language', 'tag0Url' => route('languageStartPoint')])

	<div class="p-2 module-entry-main">
		@include('admin.includes.addButton', ['text' => 'Language', 'url' => route('languageAdd')])

		<div>
			@foreach($languages as $data)
				@include('admin.includes.horizontalEditDeleteBlock', [
					'title' => $data -> title,
					'editLink' => route('languageEdit', $data -> id),
					'deleteLink' => route('languageDelete', $data -> id)
				])
			@endforeach
		</div>
	</div>
@endsection