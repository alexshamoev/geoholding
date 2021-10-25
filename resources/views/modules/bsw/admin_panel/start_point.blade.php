@extends('admin.master')


@section('pageMetaTitle')
    BSW Start Point
@endsection


@section('content')
	@include('admin.includes.tags', ['tag0Text' => 'BSW', 'tag0Url' => route('bswStartPoint')])

	<div class="p-2">
		@include('admin.includes.addButton', ['text' => 'Add BSW', 'url' => route('bswAdd')])


		@foreach($bsws as $data)
			@php
				$text = '';

				foreach($languages as $langData) {
						$text .= $data -> { 'word_'.$langData -> title };
						$text .= ' / ';
				}
			@endphp


			@include('modules.bsw.admin_panel.includes.horizontalEditDeleteBlock', [
				'title' => $data -> system_word,
				'text' => $text,
				'editLink' => route('bswEdit', $data -> id),
				'deleteLink' => route('bswDelete', $data -> id)
			])
		@endforeach
	</div>
@endsection