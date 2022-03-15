@extends('admin.master')


@section('pageMetaTitle')
    Languages
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'Language'
	])

	<div class="p-2 languages">
		@if(Session :: has('successStatus'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{ Session :: get('successStatus') }}
				</div>
			</div>
		@endif


		@if(Session :: has('successDeleteStatus'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{ Session :: get('successDeleteStatus') }}
				</div>
			</div>
		@endif


		{{ Form :: open(array('url' => route('languageStartPoint'))) }}
			@include('admin.includes.addButton', ['text' => 'Add Language', 'url' => route('languageAdd')])
			
			<div id="rangBlocks" data-db_table="languages">
				@foreach($languages as $data)
					@include('modules.languages.admin_panel.includes.horizontalEditDeleteBlock', [
						'id' => $data -> id,
						'title' => $data -> title,
						'editLink' => route('languageEdit', $data -> id),
						'deleteLink' => route('languageDelete', $data -> id),
						'like_default_for_admin' => $data -> like_default_for_admin,
						'like_default' => $data -> like_default
					])
				@endforeach
			</div>

			<div class="p-2 submit-button">
				{{ Form :: submit('Submit') }}
			</div>
		{{ Form :: close() }}
	</div>
@endsection