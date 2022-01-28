<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app() -> getLocale()) }}">
	<head>
		<title>Admin > @yield('pageMetaTitle')</title>

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
		<script src="{{ asset('js/admin/ckeditor.js') }}"></script>

		<script src="{{ asset('js/modules/modules/a/basic.js') }}"></script>
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