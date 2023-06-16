@extends('master')

@section('pageMetaTitle'){{ $page -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $page -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $page -> metaUrl }}@endsection

@section('content')

	<div class="d-flex justify-content-around">
		<h1>{{ $activeCompany->title }}</h1>
	</div>

@endsection