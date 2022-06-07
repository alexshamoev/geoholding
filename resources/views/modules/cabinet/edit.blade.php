@extends('master')

@section('pageMetaTitle'){{ $page -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $page -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $page -> metaUrl }}@endsection

@section('content')
	<div class="container p-2 main_content--height">
		<h1 class="p-2">
			{{ $page -> title }}
		</h1>

		<div class="p-2">
			{!! $page -> text !!}
		</div>


        {{ Form :: open(array('route' => array('updateCabinet', $language->title), 'method' => 'POST')) }}
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('auth.name') }}:</label>

                <div class="col-md-6">
                    <input id="name" type="text" name="name" value="{{ $user -> name }}" class="@error('name') is-invalid @enderror">

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
                    <input id="last_name" type="text" name="last_name" value="{{ $user -> last_name }}" class="@error('last_name') is-invalid @enderror">

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
                    <input id="email" type="email" name="email" value="{{ $user -> email }}" class="@error('email') is-invalid @enderror">

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
                    <input id="phone" type="text" name="phone" value="{{ $user -> phone }}" class="@error('phone') is-invalid @enderror">

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
                    <input id="address" type="text" name="address" value="{{ $user -> address }}" class="@error('address') is-invalid @enderror">

                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{ Form :: submit('Submit') }}
        {{ Form :: close() }}
	</div>
@endsection