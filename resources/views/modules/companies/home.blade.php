@extends('master')

@section('pageMetaTitle'){{ $activeCompany->title .' - '. $activeHome -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $activeHome -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $activeHome -> metaUrl }}@endsection

@section('content')
	<div class="d-flex flex-column align-items-center">
		<h1>{{ $activeHome->title }}</h1>
		
		<hr>
		<h1>{{ $activeHome->section1title }}</h1>
		<p>Text: {!! $activeHome->section1text !!}</p>
		@if (file_exists(public_path('storage/images/modules/companies/81/s1_' . $activeHome->id . '.jpg')))
			<img class="w-25" src="{{ asset('storage/images/modules/companies/81/s1_' . $activeHome->id . '.jpg') }}" alt="{{ $activeHome->section1title }}">
		@endif
		
		<hr>
		<h1>{{ $activeHome->section2title }}</h1>
		<p>Text: {!! $activeHome->section2text !!}</p>
		@if (file_exists(public_path('storage/images/modules/companies/81/s2_' . $activeHome->id . '.jpg')))
			<img class="w-25" src="{{ asset('storage/images/modules/companies/81/s2_' . $activeHome->id . '.jpg') }}" alt="{{ $activeHome->section2title }}">
		@endif

		<hr>
		<hr>
		@if (!empty($activeHome->services))
			@foreach ($activeHome->services as $item)
				@if (file_exists(public_path('storage/images/modules/companies/82/' . $item->id . '.svg')))
					<img class="w-25" src="{{ asset('storage/images/modules/companies/82/' . $item->id . '.svg') }}" alt="{{ $item->title }}">
				@endif
				<h1>{{ $item->title }}</h1>
				<div>{!! $item->text !!}</div>
			@endforeach
		@endif
		
		<hr>
		<h1>{{ $activeHome->section3title }}</h1>
		<p>Text: {!! $activeHome->section3text !!}</p>

		<hr>
		@if (!empty($activeHome->products))
			<h1>{{ $activeHome->products->title }}</h1>
			<p>{!! $activeHome->products->text !!}</p>
			@foreach ($activeHome->products->images as $item)
				@if (file_exists(public_path('storage/images/modules/companies/84/' . $item->id . '.jpg')))
					<img class="w-25" src="{{ asset('storage/images/modules/companies/84/' . $item->id . '.jpg') }}" alt="{{ $item->title }}">
				@endif
			@endforeach
			
		@endif

		@if (!empty($activeHome->reason))
			<h1>{{ $activeHome->reason->title }}</h1>
			<p>{!! $activeHome->reason->text !!}</p>
			
			@php $id = 0; @endphp
			@foreach ($activeHome->reason->reasons as $item)
				{{ ++$id }}
				<h1>{{ $item->title }}</h1>
				<p>{!! $item->text !!}</p>
			@endforeach
			
		@endif

	</div>
@endsection