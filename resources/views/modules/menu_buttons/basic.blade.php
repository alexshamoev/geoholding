<nav class="navbar-expand-lg">
	<div class="row align-items-center">
		<div class="col-xl-3 col-lg-3 col-12 p-0 d-flex justify-content-between align-items-center">
			<div class="p-2">
				<img src="{{ asset('/images/admin/logo.svg') }}" alt="HobbyStudio">
			</div>

			<div 
				class="navbar-toggler" 
				data-toggle="collapse" 
				data-target="#navbar" 
				aria-controls="navbar" 
				aria-expanded="false" 
				aria-label="Toggle navigation">
				<div class="navbar__toggler-icon"></div>
			</div>
		</div>

		<div class="col-xl-9 col-lg-9 col-12 p-0">
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
		</div>
	</div>
</nav>