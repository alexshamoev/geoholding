<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app() -> getLocale()) }}">
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF Token -->

        <title>@yield('pageMetaTitle')</title>

		<meta name="description" content="@yield('pageMetaDescription')">
		<meta property="og:image" content="https://laravel.hobbystudio.ge/@yield('pageMetaUrl')">

		<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/'.app() -> getLocale().'.css') }}">
		<link rel="shortcut icon" href="{{ asset('/storage/images/site_icon.png') }}">

		<script src="{{ asset('js/app.js') }}"></script>

		<!-- Plugins -->
			<!-- photoswipe -->
				<link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/photoswipe.css') }}">
				<link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/default-skin.css') }}">

				<script src="{{ asset('js/plugins/photoswipe-ui-default.min.js') }}"></script>
				<script src="{{ asset('js/plugins/photoswipe.min.js') }}"></script>
			<!--  -->

			<!-- sweetalert2 -->
				<script src="{{ asset('js/plugins/sweetalert2.all.min.js') }}"></script>
			<!--  -->

			<!-- owl carousel -->
				<link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/owl.carousel.min.css') }}">
				<link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/owl.theme.default.min.css') }}">

				<script src="{{ asset('js/plugins/owl.carousel.min.js') }}" ></script>
			<!--  -->
		<!--  -->
    </head>

    <body>
		@include('includes.photoswipe')

		@include('includes.bootstrap_size_getter')

		@include('modules.header.basic')

		<section>
			@yield('content')
			
			@include('modules.partners.step0')
		</section>

		@include('modules.footer.basic')


		<input type="hidden" value="{{ App :: getLocale() }}" class="js_lang">
    </body>
</html>