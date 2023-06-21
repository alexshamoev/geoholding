@extends('master')

@section('pageMetaTitle'){{ $activeCompany->title .' - '. $activeHome -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $activeHome -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $activeHome -> metaUrl }}@endsection

@section('content')
	<div class="d-flex flex-column align-items-center">
		<h1>{{ $activeHome->title }}</h1>
		Page: {{ $page -> title }}
		<p>Text: {!! $activeHome->text !!}</p>
	</div>

@endsection