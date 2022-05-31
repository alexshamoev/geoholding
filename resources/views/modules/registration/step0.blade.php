@extends('master')

@section('pageMetaTitle'){{ $page -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $page -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $page -> metaUrl }}@endsection

@section('content')
	<div class="p-2">
		<div class="p-2">
			<h1 class="text-center">
				{{ $page -> title }}
			</h1>
		</div>
	</div>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">{{ __('Register') }}</div>

					<div class="card-body">
						{{ Form :: open(array('route' => array('register', $language->title, $page->alias), 'method' => 'POST')) }}
							<div class="form-group row">
								<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('auth.name') }}:</label>

								<div class="col-md-6">
									{{ Form :: text('name', null, array('placeholder' => __('auth.placeholderName'))) }}

									@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('auth.lastName') }}:</label>

								<div class="col-md-6">
									{{ Form :: text('last_name', null, array('placeholder' => __('auth.placeholderLastName'))) }}

									@error('last_name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('auth.email') }}:</label>

								<div class="col-md-6">
									{{ Form :: text('email', null, array('placeholder' => __('auth.placeholderEmail'))) }}

									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('auth.phone') }}:</label>

								<div class="col-md-6">
									{{ Form :: text('phone', null, array('placeholder' => __('auth.placeholderPhone'))) }}

									@error('phone')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="address" class="col-md-4 col-form-label text-md-right">{{ __('auth.address') }}:</label>

								<div class="col-md-6">
									{{ Form :: text('address', null, array('placeholder' => __('auth.placeholderAddress'))) }}

									@error('address')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('auth.password') }}:</label>

								<div class="col-md-6">
									{{ Form :: text('password') }}

									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="confirmPassword" class="col-md-4 col-form-label text-md-right">{{ __('auth.confirmPassword') }}:</label>

								<div class="col-md-6">
									{{ Form :: text('confirmPassword') }}
								</div>
							</div>

							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
									{{ Form :: submit(__('auth.register')) }}
								</div>
							</div>
						{{ Form :: close() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection