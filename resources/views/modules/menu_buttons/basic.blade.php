<nav class="navbar-expand-lg">
	<div class="navbar-collapse collapse justify-content-center" id="navbar">
		<div class="navbar-nav">
			@foreach($menuButtons as $data)
			<div class="nav-item">
				<a href="{{ $data -> url }}">
					<div class="p-2">
						{{ $data -> title }}
					</div>
				</a>
			</div>
			@endforeach
		</div>

		<div class="d-xl-none d-lg-none d-block">
			@include('modules.languages.basic')
		</div>
	</div>
</nav>