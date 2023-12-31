@extends('master')

@section('pageMetaTitle'){{ $page -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $page -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $page -> metaUrl }}@endsection

@section('content')
	<div class="container p-2 main_content--height">
		<h1 class="p-2">
			{{ $page -> title }}
		</h1>

		<div class="p-2">
			{!! $page -> text !!}
		</div>

		<div class="p-2">
			<a href="tel:{{ config('bsc.phone_number') }}">{{ config('bsc.phone_number')  }}</a>
		</div>

		<div class="p-2">
			<a href="mailto:{{ config('bsc.admin_email') }}">{{ config('bsc.admin_email') }}</a>
		</div>
	</div>
@endsection
