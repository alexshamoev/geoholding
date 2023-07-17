@extends('master')

@section('pageMetaTitle'){{ $activeCompany->title .' - '. $activeHome -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $activeHome -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $activeHome -> metaUrl }}@endsection

@section('content')
	<div class="d-flex flex-column align-items-center">
		<h1>{{ $activeHome->title }}</h1>
		<p>Text: {!! $activeHome->text !!}</p>

		<hr>
		<hr>
		@if (!empty($activeHome->services))
			@foreach ($activeHome->services as $item)
				@if (file_exists(public_path('storage/images/modules/companies/82/' . $item->id . '.svg')))
					<img class="w-25" src="{{ asset('storage/images/modules/companies/82/' . $item->id . '.svg') }}" alt="{{ $item->title }}" style="background-color: black">
				@endif
				<h1>{{ $item->title }}</h1>
				<div>{!! $item->text !!}</div>
			@endforeach
			
		@endif
	</div>

@endsection