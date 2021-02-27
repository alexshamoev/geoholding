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

			@if(Auth :: check())
				<div class="nav-item">
					<a href="{{ route('logout') }}">
						<div class="p-2">
							Logout
						</div>
					</a>
				</div>
			@else
				<div class="nav-item">
					<a href="{{ $registrationUrl }}">
						<div class="p-2">
							Registration
						</div>
					</a>
				</div>

				<div class="nav-item">
					<a href="{{ $authorizationUrl }}">
						<div class="p-2">
							Authorization
						</div>
					</a>
				</div>
			@endif
		</div>

		<div class="d-xl-none d-lg-none d-block">
			@include('modules.languages.basic')
		</div>
	</div>
</nav>