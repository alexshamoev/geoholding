<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app() -> getLocale()) }}">
	<head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF Token -->
        
		<title>Admin > Login</title>

		<meta name="csrf-token" content="{{ csrf_token() }}" />

		<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/main.css') }}">

        <script src="{{ asset('js/admin/main.js') }}"></script> <!-- must be first because it loads jquery -->
		<script src="{{ asset('js/admin/ckeditor.js') }}"></script>
	</head>

	<body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mt-5 login p-2">
                    <div class="d-flex align-items-center login__header row">
                        <div class="col-4 p-2">
                            <img src="{{ asset('/storage/images/admin/logo.svg') }}" alt="HobbyStudio">
                        </div>

                        <div class="col-8 p-2">
                            <div style="font-size: 28px" class="pb-1">Cms <span style="font-size: 14px; color: #004b91;">v2.9.4</span></div>

                            <div style="font-size: 13px">Created By <a href="#">HobbyStudio</a></div>
                        </div>
                    </div>

                    <div class="login__body">
                        <form method="POST" action="{{ route('adminLogin') }}">
                            @csrf

                            @error('email')
                                <div class="p-2 invalid-feedback d-block">
                                    <span role="alert">
                                        <strong>{{ __('bsw.badLoginData') }}</strong>
                                    </span>
                                </div>
                            @enderror

                            <div class="p-2">
                                <div class="standard-block p-2">
                                    <label>
                                        <div class="p-2">
                                            {{ __('bsw.email') }}: <span>*</span>
                                        </div>

                                        <div class="p-2">
                                            <input id="email"
                                                    type="email"
                                                    class="form-control w-100"
                                                    name="email"
                                                    value="{{ old('email') }}"
                                                    required
                                                    autocomplete="email"
                                                    autofocus>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="p-2">
                                <div class="standard-block p-2">
                                    <label>
                                        <div class="p-2">
                                            {{ __('bsw.password') }}: <span>*</span>
                                        </div>

                                        <div class="p-2">
                                            <input id="password"
                                                    type="password"
                                                    class="form-control w-100"
                                                    name="password"
                                                    required
                                                    autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </label>
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

                            <div class="form-group p-2">
                                <!-- <div class="login__submit py-2 px-3 d-inline-block" id="login_submit">
                                    სისტემაში შესვლა
                                </div> -->

                                <input type="submit"
                                        class="login__submit px-3 py-2"
                                        value="{{ __('bsw.login') }}">
                                

                                @if(Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>

                            <!-- <div class="p-2">
                                <a href="#">Forgot Password?</a>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</body>
</html>