@extends('master')

@section('pageMetaTitle'){{ $activeCompany->title .' - '. $activeAbout -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $activeAbout -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $activeAbout -> metaUrl }}@endsection

@section('content')
	<div class="d-flex flex-column align-items-center">
		<h1>{{ $activeAbout->title }}</h1>

		<p>{!! $activeAbout->section1text !!}</p>

		@if (file_exists(public_path('storage/images/modules/companies/80/' . $activeAbout->id . '.jpg')))
			<div class="home__gradient">
				<img class="home__gradinet_div mb-2" src="{{ asset('storage/images/modules/companies/80/' . $activeAbout->id . '.jpg') }}" alt="{{ $activeAbout->title }}">
			</div>							
		@endif

		<button >{{ __('bsw.contact_us') }}</button>

		<h1>{{ $activeAbout->section2title }}</h1>
		<p>{!! $activeAbout->section2text !!}</p>


		<h1>{{ $activeAbout->section3title }}</h1>
		<p>{!! $activeAbout->section3text !!}</p>

	</div>

@endsection