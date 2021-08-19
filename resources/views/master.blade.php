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
		@include('modules.header.basic')
		

        <div class="container">
			@yield('content')

			<div id="example">
				
			</div>
        </div>


		@include('modules.partners.step0')


		@include('modules.footer.basic')
    </body>
</html>