@extends('master')

@section('pageMetaTitle'){{ $page -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $page -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $page -> metaUrl }}@endsection

@section('content')

	<div class="d-flex flex-column align-items-center">
		<div class="row text-center py-5">
			<h1>{{ $activeContact->title }}</h1>

			<p>{!! $activeContact->text !!}</p>
		</div>

		@if(Session::has('contact-success'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{ Session::get('contact-success') }}
				</div>
			</div>
		@endif
		
		@if(Session::has('contact-error'))
			<div class="p-2">
				<div class="alert alert-error m-0" role="alert">
					{{ Session::get('contact-error') }}
				</div>
			</div>
		@endif

		{{ Form::open(array('route' => 'sendContact', 'method' => 'POST', 'id' => 'send_form')) }}
						
			<h3>{{ __('bsw.send_us_msg') }}</h3>

			
			{{ Form::text('fullname', old('fullname'), array('required' => 'required', 'placeholder' => __('bsw.your_name'))) }}
			
			{{ Form::text('company_name', old('company_name'), array('placeholder' => __('bsw.company_name'))) }}
									
			{{ Form::email('email_address', old('email_address'), array('required' => 'required', 'placeholder' => __('bsw.your_email'))) }}
						
			{{ Form::tel('phone_number', old('phone_number'), array('required' => 'required', 'placeholder' => __('bsw.your_phone'), 'maxlength' => '15')) }}

			{{ Form::textarea('message', old('message'), array('placeholder' => __('bsw.write_your_text'))) }}

			{{ Form::submit(__('bsw.send')) }}
		
		{{ Form::close() }}

		<h3>{{ __('bsw.contact_info') }}</h3>
		
		<img src="{{ asset('storage/images/phone.svg') }}" alt="phone" style="background-color: black" class="w-25">
		<a href="tel:{{ $activeContact->phone_number }}">{{ $activeContact->phone_number }}</a>

		<img src="{{ asset('storage/images/mail.svg') }}" alt="mail" style="background-color: black" class="w-25">
		<a href="mailto:{{ $activeContact->email }}">{{ $activeContact->email }}</a>
		
		<img src="{{ asset('storage/images/point.svg') }}" alt="point" style="background-color: black" class="w-25">
		<a href="{{ $activeContact->address_link }}" target="_blank">{{ $activeContact->address }}</a>

		<br>
		<a href="{{ $activeContact->facebook_link }}" target="_blank">{{ $activeContact->facebook_link }}</a>
		<a href="{{ $activeContact->instagram_link }}" target="_blank">{{ $activeContact->instagram_link }}</a>
		<a href="{{ $activeContact->linkedin_link }}" target="_blank">{{ $activeContact->linkedin_link }}</a>
	</div>
	
@endsection