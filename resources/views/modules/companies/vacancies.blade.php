@extends('master')

@section('pageMetaTitle'){{ $activeCompany->title .' - '. $activeVacancy -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $activeVacancy -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $activeVacancy -> metaUrl }}@endsection

@section('content')
	<div class="d-flex flex-column align-items-center">
		
		<h2>{{ $activeVacancy->title }}</h2>
		
		<div class="container p-2">
			<div class="row p-2 vacancies__head_list">
				<div class="col-6 text-center">
					{{ __('bsw.position_name') }}
				</div>

				<div class="col-3 text-end">
					{{ __('bsw.last_date') }}
				</div>

				<div class="col-3 text-center">
					{{ __('bsw.published') }}
				</div>
			</div>

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