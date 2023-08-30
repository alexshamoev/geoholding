@extends('master')

@section('pageMetaTitle'){{ $activeCompany->title .' - '. $activeBrand -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $activeBrand -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $activeBrand -> metaUrl }}@endsection

@section('content')
	<div class="d-flex flex-column align-items-center">
		
		<h1>{{ $activeBrand->title }}</h1>
		
		<div class="">
			@if ($activeBrand->brands->isNotEmpty())
				@foreach ($activeBrand->brands as $brand)
					@if (file_exists(public_path('storage/images/modules/companies/89/' . $brand->id . '.png')))
						<div class="home__gradient">
							<img class="mb-2" src="{{ asset('storage/images/modules/companies/89/' . $brand->id . '.png') }}" alt="{{ $brand->title }}">
						</div>

						<p>{{ $brand->title }}</p>
					@endif
				@endforeach
			@endif
		</div>

	</div>

@endsection