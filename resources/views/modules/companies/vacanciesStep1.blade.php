@extends('master')

@section('pageMetaTitle'){{ $activeCompany->title .' - '. $active -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $active -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $active -> metaUrl }}@endsection

@section('content')
	<div class="d-flex flex-column align-items-center">
		
		<div class="">

			@isset($active)
				
				<p>{{ __('bsw.position_name') }} : {{ $active->title }}</p>
				<p>{{ __('bsw.last_date') }} / {{ __('bsw.published') }} :  {{ $active->last_date }} / {{ date_format($active->created_at,"d.m.Y") }}</p>
				<p>{{ __('bsw.location') }} : {{ $active->location }}</p>
				<p>{{ __('bsw.send_resume') }} : {{ $active->email }}</p>
				
				<br>
				{!! $active->text !!}

			@endisset

		</div>

	</div>

@endsection