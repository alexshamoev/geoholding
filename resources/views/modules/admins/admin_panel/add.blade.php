@extends('admin.master')


@section('pageMetaTitle')
	{{ $module -> title }} > {{ __('bsw.adding') }}
@endsection


@section('content')
    @include('admin.includes.tags', [
		'tag0Text' => $module -> title,
		'tag0Url' => route('adminStartPoint'),
		'tag1Text' => __('bsw.adding')
	])
	

	<div class="p-2">
		@if($errors -> any())
			<div class="p-2">
				<div class="alert alert-danger m-0">
					{{ __('bsw.warningStatus') }}
				</div>
			</div>
		@endif
		
		
		@if(Session :: has('successStatus'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{ Session :: get('successStatus') }}
				</div>
			</div>
		@endif


    	{{ Form :: open(array('route' => array('adminInsert'))) }}
			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>სახელი: *</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('name') }}
					</div>
				</div>

                @error('name')
					<div class="alert alert-danger m-0">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>ელ. ფოსტა: *</span>
					</div>

					<div class="p-2">
						{{ Form :: text('email') }}
					</div>
				</div>

                @error('email')
					<div class="alert alert-danger m-0">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>პაროლი: *</span>
					</div>

					<div class="p-2">
						{{ Form :: password('password') }}
					</div>
				</div>

                @error('password')
					<div class="alert alert-danger m-0">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>გაიმეორეთ პაროლი: *</span>
					</div>

					<div class="p-2">
						{{ Form :: password('password_confirmation') }}
					</div>
				</div>

                @error('password_confirmation')
					<div class="alert alert-danger m-0">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="p-2 submit-button">
				{{ Form :: submit(__('bsw.adding')) }}
			</div>
		{{ Form :: close() }}
	</div>
@endsection