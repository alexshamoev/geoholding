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

	@if(Session::has('alert'))
		<span class="d-flex flex-wrap" role="alert">
			<strong>{{ Session::get('alert') }}</strong>
		</span>
	@endif

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						{{ Form :: open(array('route' => array('login', $language->title), 'method' => 'POST')) }}
							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('auth.email') }}:</label>

								<div class="col-md-6">
									<input id="email" type="email" name="email" class="@error('email') is-invalid @enderror">

									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('auth.password') }}:</label>

								<div class="col-md-6">
									<input id="password" type="password" name="password" class="@error('password') is-invalid @enderror">

									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<a href="{{ route('recover', $language->title) }}">
									{{ __('auth.forgot_password') }}
								</a>	
							</div>

							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
									{{ Form :: submit(__('auth.login')) }}
								</div>
							</div>
						{{ Form :: close() }}
					</div>

					<a href="{{ url('auth/google') }}" style="margin-top: 0px !important;background: green;color: #ffffff;padding: 5px;border-radius:7px;" class="ml-2">
					<strong>Google Login</strong>
					</a> 

					<div class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;">
						<a href="{{ url('auth/google') }}">
							<i class="fab fa-google me-2"></i> Sign in with google
						</a>	
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection