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
						{{ Form :: open(array('route' => array('recover', $language->title), 'method' => 'POST')) }}
							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('auth.email') }}:</label>

								<div class="col-md-6">
									<input id="email" type="email" name="email" class="@error('email') is-invalid @enderror">

									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

                                    @if(Session::has('error'))
                                        <span class="d-flex flex-wrap" role="alert">
											<strong>{{ Session::get('error') }}</strong>
										</span>
                                    @endif
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