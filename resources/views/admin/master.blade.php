<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app() -> getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF Token -->
		
		<title>Admin > @yield('pageMetaTitle')</title>

		<meta name="csrf-token" content="{{ csrf_token() }}" />

		<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/main.css') }}">

		<script src="{{ asset('js/admin/main.js') }}"></script> <!-- must be first because it loads jquery -->
		<script src="{{ asset('js/admin/ckeditor.js') }}"></script>
	</head>

	<body>
		<div class="container p-3">
			@include('admin.includes.header')

			<section>
				<div class="row">
					<div class="col-2 p-0">
						@include('admin.includes.menu')
					</div>

					<div class="col-10 content p-0">
						@yield('content')
					</div>
				</div>
			</section>

			@include('admin.includes.footer')
		</div>
	</body>
</html>