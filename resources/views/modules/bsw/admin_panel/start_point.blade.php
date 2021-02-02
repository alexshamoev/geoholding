@extends('admin.layouts.master')


@section('pageMetaTitle')
    BSw
@endsection


@section('content')
	@include('admin.includes.tags', ['tag0Text' => 'BSW', 'tag0Url' => route('bswStartPoint')])


	@include('admin.includes.addButton', ['text' => 'BSW', 'url' => route('bswAdd')])


	@foreach($bsws as $data)
		@php
			$text = '';

			foreach($languages as $langData) {
					$text .= $data -> { 'word_'.$langData -> title };
					$text .= ' / ';
			}
		@endphp


		@include('admin.includes.horizontalEditDeleteBlock', [
			'title' => $data -> system_word,
			'text' => $text,
			'editLink' => route('bswEdit', $data -> id),
			'deleteLink' => route('bswDelete', $data -> id)
		])
	@endforeach
@endsection