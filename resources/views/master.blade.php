<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app() -> getLocale()) }}">
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Laravel') }}</title>

		<!-- Scripts -->
		<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

		<!-- Fonts -->
		<!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

		<!-- Styles -->
		<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->


        {{--<title>App Name - @yield('pageMetaTitle')</title>--}}


		<link rel="stylesheet" type="text/css" href="{{ asset('css/modules/app.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/modules/html_tags.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/modules/icons.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/modules/main.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/modules/custom-bootstrap.css') }}">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<script src="{{ mix('js/app.js') }}"></script>
		<script src="{{ asset('js/modules/basic.js') }}"></script>
    </head>

    <body>
		<header>
			<div class="container">
				<div class="header p-2">
					<div class="d-flex align-items-center justify-content-between">
						<div class="p-2">
							<span>{{ $bsw -> phone_number }}: {{ $bsc -> phone_number }}</span>
						</div>

						<div class="d-flex align-items-center justify-content-end">
							<div class="header__search-input js_search">
								<div class="p-2">
									<input type="text" placeholder="ძიება">
								</div>
							</div>

							<div>
								<div class="p-2 js_open_search header__open-search">
									<span class="ba_search"></span>
								</div>

								<div class="p-2 js_close_search header__close-search">
									<span class="ba_close"></span>
								</div>
							</div>
						</div>
					</div>

					<div class="d-flex align-items-center">
						<div class="col-xl-10 col-lg-10 col-12">
							<div class="row align-items-center">
								<div class="col-xl-2 col-lg-2 col-12 p-0 d-flex justify-content-between align-items-center">
									<div class="p-2">
										<img src="{{ asset('/images/admin/logo.svg') }}" alt="HobbyStudio">
									</div>

									<div class="navbar-toggler d-lg-none d-block" 
										data-toggle="collapse" 
										data-target="#navbar" 
										aria-controls="navbar" 
										aria-expanded="false" 
										aria-label="Toggle navigation">
										<div class="navbar__toggler-icon"></div>
									</div>
								</div>

								<div class="col-xl-10 col-lg-10 col-12 p-0">
									@include('modules.menu_buttons.basic')
								</div>
							</div>
						</div>

						<div class="col-2 p-0 d-xl-block d-lg-block d-none">
							@include('modules.languages.basic')
						</div>
					</div>
				</div>
			</div>
		</header>


        <div class="container">
			@yield('content')

			<div id="example">
				
			</div>
        </div>


		@include('modules.partners.step0')


		<footer class="p-2 row">
			<div class="container">
				<div class="p-2">
					Footer Menu
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-md-6 col-12 text-md-left text-center">
						Copyright
					</div>

					<div class="col-md-6 col-12 text-md-right text-center">
						Created by <a href="http://hobbystudio.ge/" target="_blank">HobbyStudio</a>
					</div>
				</div>
			</div>

			<div id="admin-panel-link">
				<a href="/admin" target="_blank">
					Admin Panel
				</a>
			</div>
		</footer>
    </body>
</html>