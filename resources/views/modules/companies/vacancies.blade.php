@extends('master')

@section('pageMetaTitle'){{ $activeCompany->title .' - '. $activeVacancy -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $activeVacancy -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $activeVacancy -> metaUrl }}@endsection

@section('content')
<div class="d-flex flex-column align-items-center p-2 pt-0">

	<h2 class="my-sm-5 my-3 mt-0">{{ $activeVacancy->title }}</h2>

	<div class="container p-2 px-xxl-0 px-xl-5">
		<div class="px-xxl-0 px-xl-3">
			<div class="row p-2 vacancies__head_list">
				<div class="col-6 text-center text-white">
					{{ __('bsw.position_name') }}
				</div>
	
				<div class="col-3 text-end text-white">
					{{ __('bsw.last_date') }}
				</div>
	
				<div class="col-3 text-center text-white">
					{{ __('bsw.published') }}
				</div>
			</div>
		

			@if ($vacancies->isNotEmpty())
				@foreach ($vacancies as $vacancy)
					<a href="{{ $vacancy->fullUrl }}">
						@if (file_exists(public_path('storage/images/modules/companies/90/' . $activeVacancy->id . '.png')))
							<div class="vacancies__box_shadow 
							text-dark 
							row 
							border 
							vacancies__rounded_border 
							mt-3 
							mb-3 
							align-items-center
							pt-2 
							pb-2">
								<div class="col-md-1 col-sm-0"></div>
								<div class="col-md-5 col-sm-6  d-flex align-items-center justify-content-start ps-5 gap-5">
									<img class="w-25" src="{{ asset('storage/images/modules/companies/90/' . $activeVacancy->id . '.png') }}"
										alt="{{ $vacancy->title }}">
									<div>{{ $vacancy->title }}</div>
								</div>
								<div class="col-3 text-end">{{ date("d.m.Y", strtotime($vacancy->last_date)) }}</div>
								<div class="col-3 text-center">{{ date_format($vacancy->created_at,"d.m.Y") }}</div>
							</div>
						@endif
					</a>
				@endforeach
			@endif

			{{ $vacancies->links() }}
		</div>
	</div>
</div>

@endsection