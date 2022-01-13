<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app() -> getLocale()) }}">
	<head>
		<title>Admin > Login</title>

		<meta name="csrf-token" content="{{ csrf_token() }}" />

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/custom-bootstrap.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/classes.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/identifiers.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/for_editors.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/html_tags.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/jquery_ui.css') }}">

		<!-- basic.js must be first because it loads jquery -->
		<script src="{{ asset('js/admin/basic.js') }}"></script>
		<script src="{{ asset('js/admin/rangs.js') }}"></script>
	</head>

	<body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-12 mt-5 login p-2">
                   
                    <div class="d-flex align-items-center login__header">
                        <div class="login__header_image">
                            <img src="{{ asset('/storage/images/admin/logo.svg') }}" alt="HobbyStudio" class="w-100 p-2">
                        </div>

                        <div class="d-flex flex-column ps-3">
                            <div style="font-size: 25px" class="fw-bold pb-1">Cms <span style="font-size: 14px">v2.9.4</span></div>

                            <div style="font-size: 13px">Created By <a href="#">HobbyStudio</a></div>
                        </div>
                    </div>

                    <div class="login__body p-2">
                        <form method="POST" action="{{ route('adminLogin') }}">
                            @csrf

                            <div class="login__input_wrapper row flex-column p-3 mb-4">
                                <label for="email" class="col-md-4 pt-0 pb-1 col-form-label text-md-right w-100">{{ __('E-Mail Address') }}: <span>*</span></label>

                                <div class="col-md-6 w-100">
                                    <input id="email"
                                            type="email"
                                            class="form-control @error('email') is-invalid @enderror w-100"
                                            name="email"
                                            value="{{ old('email') }}"
                                            required
                                            autocomplete="email"
                                            autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="login__input_wrapper row flex-column p-3">
                                <label for="password" class="col-md-4 pt-0 pb-1 col-form-label text-md-right w-100">{{ __('Password') }}: <span>*</span></label>

                                <div class="col-md-6 w-100">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror w-100" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="admin" id="admin" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Admin') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div> -->

                            <div class="form-group mb-0 mt-3">
                                <!-- <div class="login__submit py-2 px-3 d-inline-block" id="login_submit">
                                    სისტემაში შესვლა
                                </div> -->

                                <button type="submit" class="login__submit py-2 px-3 d-inline-block">
                                    სისტემაში შესვლა
                                </button>


                                @if(Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</body>
</html>