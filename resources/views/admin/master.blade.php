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
		

		<!-- Plugins -->
			<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/decoupled-document/ckeditor.js"></script>


			<!-- photoswipe -->
				<link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/photoswipe.css') }}">
				<link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/default-skin.css') }}">
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

				<script src="{{ asset('js/plugins/photoswipe-ui-default.min.js') }}"></script>
				<script src="{{ asset('js/plugins/photoswipe.min.js') }}"></script>
			<!--  -->

			<!-- sweetalert2 -->
				<script src="{{ asset('js/plugins/sweetalert2.all.min.js') }}"></script>
			<!--  -->
		<!--  -->
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