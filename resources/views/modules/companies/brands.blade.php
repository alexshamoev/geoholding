@extends('master')

@section('pageMetaTitle'){{ $activeCompany->title .' - '. $activeBrand -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $activeBrand -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $activeBrand -> metaUrl }}@endsection

@section('content')
	<div class="container p-2">
		<h2 class="p-2 text-center pt-3 pb-5">{{ $activeBrand->title }}</h2 class="p-2">
		
		<div class="row">
			@if ($activeBrand->brands->isNotEmpty())
				@foreach ($activeBrand->brands as $brand)
					@if (file_exists(public_path('storage/images/modules/companies/89/' . $brand->id . '.png')))
						<div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6 p-2">	
							<div class="brands__box text-center p-3">
								<div>
									<img class="mb-2" src="{{ asset('storage/images/modules/companies/89/' . $brand->id . '.png') }}" alt="{{ $brand->title }}">
								</div>

								<h3 class="brands__small_title">{{ $brand->title }}</h3>
							</div>
						</div>
					@endif
				@endforeach
			@endif
		</div>	
	</div>
@endsection