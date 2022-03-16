@extends('admin.master')


@section('pageMetaTitle')
	{{ $module -> title }} > {{ $activeAdmin -> email }}
@endsection


@section('content')
    @include('admin.includes.tags', [
		'tag0Text' => $module -> title,
		'tag0Url' => route('adminStartPoint'),
		'tag1Text' => $activeAdmin -> email
	])


    @include('admin.includes.bar', [
		'addUrl' => route('adminAdd'),
		'deleteUrl' => route('adminDelete', $activeAdmin -> id),
		'nextId' => $nextAdminId,
		'prevId' => $prevAdminId,
		'nextRoute' => route('adminEdit', $nextAdminId),
		'prevRoute' => route('adminEdit', $prevAdminId),
		'backRoute' => route('adminStartPoint')
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


    	{{ Form :: model($activeAdmin, array('route' => array('adminUpdate', $activeAdmin -> id))) }}
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
					<div class="alert alert-danger">
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
					<div class="alert alert-danger">
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
					<div class="alert alert-danger">
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
					<div class="alert alert-danger">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="p-2 submit-button">
				{{ Form :: submit('მონაცემების შეცვლა') }}
			</div>
		{{ Form :: close() }}
	</div>


    <!-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('adminAdd') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $activeAdmin -> name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $activeAdmin -> email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
@endsection