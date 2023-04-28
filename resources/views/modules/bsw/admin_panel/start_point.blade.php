@extends('admin.master')


@section('pageMetaTitle')
    BSW
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'BSW'
	])

	<div class="p-2">
		@if(Session::has('successStatus'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{ Session::get('successStatus') }}
				</div>
			</div>
		@endif


		@include('admin.includes.addButton', ['text' => 'Add BSW', 'url' => route('bsw.create')])


		@foreach($bsws as $data)
			@php
				$text = '';

				foreach($languages as $langData) {
						$text .= $data->{ 'word_'.$langData->title };
						$text .= ' | ';
				}
			@endphp


			@include('modules.bsw.admin_panel.includes.horizontalEditDeleteBlock', [
				'title' => $data->system_word,
				'text' => $text,
				'editLink' => route('bsw.edit', $data->id),
				'deleteLink' => route('bsw.destroy', $data->id)
			])
		@endforeach
	</div>
@endsection