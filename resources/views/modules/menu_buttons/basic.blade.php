@if($widgetGetVisibility['menu_buttons'])
	<div class="navbar-collapse collapse justify-content-center menu_buttons" id="navbar">
		<div class="navbar-nav
					d-flex
					justify-content-between
					position-relative">
			@foreach($menuButtons as $data)
				<div class="nav-item
							ps-lg-0
							ps-4
							pt-lg-0
							pt-1">
					@php
						$activeCssClass = '';

						if($data -> active) {
							$activeCssClass = 'active_class';
						}
					@endphp
					
					<div class="p-2">
						<a href="{{ $data -> url }}" target="{{ $data -> urlTarget }}">
							<div class="menu_buttons__link {{ $activeCssClass }}">
								{{ $data -> title }}
							</div>
						</a>

						<div>
							@foreach($data -> subMenuButtons as $dataInside)
								<a href="{{ $dataInside -> url }}" target="{{ $dataInside -> urlTarget }}">
									<div>
										{{ $dataInside -> title }}
									</div>
								</a>
							@endforeach
						</div>
					</div>
				</div>
			@endforeach

			@if(Auth :: check())
				<div class="nav-item">
					<div class="p-2">
						{{ Auth :: user() -> name }}
					</div>
				</div>
		
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
	</div>
@endif