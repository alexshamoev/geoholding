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
					<div class="card-body">
						{{ Form :: open(array('route' => array('reset', $language->title, $email), 'method' => 'POST')) }}
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
								<label for="confirmPassword" class="col-md-4 col-form-label text-md-right">{{ __('auth.confirmPassword') }}:</label>

								<div class="col-md-6">
									<input id="confirmPassword" type="password" name="confirmPassword" class="@error('confirmPassword') is-invalid @enderror">

									@error('confirmPassword')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
									{{ Form :: submit(__('auth.recover')) }}
								</div>
							</div>
						{{ Form :: close() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection