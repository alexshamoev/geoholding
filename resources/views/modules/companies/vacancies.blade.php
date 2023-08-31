@extends('master')

@section('pageMetaTitle'){{ $activeCompany->title .' - '. $activeVacancy -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $activeVacancy -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $activeVacancy -> metaUrl }}@endsection

@section('content')
	<div class="d-flex flex-column align-items-center">
		
		<h1>{{ $activeVacancy->title }}</h1>
		
		<div class="">

			{{ __('bsw.position_name') }}
			{{ __('bsw.last_date') }}
			{{ __('bsw.published') }}

			@if ($activeVacancy->vacancies->isNotEmpty())
				@foreach ($activeVacancy->vacancies as $vacancy)
					<a href="{{ $vacancy->fullUrl }}">
						@if (file_exists(public_path('storage/images/modules/companies/91/' . $vacancy->id . '.png')))
							<div class="home__gradient">
								<img class="mb-2" src="{{ asset('storage/images/modules/companies/91/' . $vacancy->id . '.png') }}" alt="{{ $vacancy->title }}">
							</div>
							
							<p>{{ $vacancy->title }}</p>
							<p>{{ $vacancy->last_date }}</p>
							<p>{{ date_format($vacancy->created_at,"d.m.Y") }}</p>
						@endif
					</a>
				@endforeach
			@endif
		</div>

	</div>

@endsection