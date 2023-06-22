@extends('master')

@section('pageMetaTitle'){{ $activeCompany->title .' - '. $activeAbout -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $activeAbout -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $activeAbout -> metaUrl }}@endsection

@section('content')
	<div class="d-flex flex-column align-items-center">
		<h1>{{ $activeAbout->title }}</h1>
		Page: {{ $page -> title }}
		<p>Company: {!! $activeAbout->text !!}</p>
	</div>

@endsection