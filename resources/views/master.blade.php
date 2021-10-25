<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app() -> getLocale()) }}">
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		{{--<title>{{ config('app.name', 'Laravel') }}</title>--}}

		<!-- Scripts -->
		<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

		<!-- Fonts -->
		<!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

		<!-- Styles -->
		<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->


        <title>HobbyStudio Template - @yield('pageMetaTitle')</title>


		<link rel="stylesheet" type="text/css" href="{{ asset('css/modules/app.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/modules/html_tags.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/modules/text_lines.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/modules/text_lines_max.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/modules/icons.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/modules/main.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/modules/menu_buttons/styles.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/modules/photo_gallery/styles.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/modules/header/styles.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/modules/footer/styles.css') }}">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<script src="{{ asset('js/app.js') }}"></script>
		<script src="{{ asset('js/modules/basic.js') }}"></script>
    </head>

    <body>
		@include('modules.header.basic')
		

        
		@yield('content')

			

		@include('modules.partners.step0')


		@include('modules.footer.basic')
    </body>
</html>