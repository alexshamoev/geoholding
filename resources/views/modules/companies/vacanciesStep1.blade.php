@extends('master')

@section('pageMetaTitle'){{ $activeCompany->title .' - '. $active -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $active -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $active -> metaUrl }}@endsection

@section('content')
<div class="container d-flex flex-column">
	<div>
		@isset($active)
		<div class="col-11 border rounded-5 vacancies_step1__header_wrapper p-0 vacancies_step1__box_shadow">
			<div class="row border-bottom border-info p-2">
				<span class="col-lg-3 col-sm-6">{{ __('bsw.position_name') }}:</span>
				<span class="col-lg-7 col-sm-6">{{ $active->title }}</span>
			</div>
			<div class="row border-bottom border-info p-2">
				<span class="col-lg-3 col-sm-6">{{ __('bsw.last_date') }} / {{ __('bsw.published') }}:</span>
				<span class="col-lg-7 col-sm-6">{{ $active->last_date }} / {{ date_format($active->created_at,"d.m.Y")
					}}</span>
			</div>
			<div class="row border-bottom border-info p-2">
				<span class="col-lg-3 col-sm-6">{{ __('bsw.location') }}:</span>
				<span class="col-lg-7 col-sm-6">{{ __($active->location) }}</span>
			</div>
			<div class="row p-2">
				<span class="col-lg-3 col-sm-6">{{ __('bsw.send_resume') }}:</span>
				<span class="col-lg-7 col-sm-6">{{ $active->email }}</span>
			</div>
		</div>
		<div class="mt-5 col-11">
			{!! $active->text !!}
		</div>
		@endisset
	</div>
</div>

@endsection