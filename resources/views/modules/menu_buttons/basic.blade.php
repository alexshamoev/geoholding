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
							pt-1
							me5">
					@php
						$activeCssClass = '';

						if($data -> active) {
							$activeCssClass = 'me2';
						}
					@endphp
					
					<div class="d-block py-2 px-4 {{ $activeCssClass }}"> 
					
						<a href="{{ $data -> url }}" target="{{ $data -> urlTarget }}">
							<span>
								{{ $data -> title }}
							</span>
						</a>

						<div class="js_arrow_div me10">
							<span class="ba_thin_arrow_right"></span>
						</div>
					</div>

					@if(count($data -> subMenuButtons))
						<div class="me7 mt-3">
							@foreach($data -> subMenuButtons as $dataInside)
								@php
									$activeCssClass = '';

									if($dataInside -> active) {
										$activeCssClass = 'me3';
									}
								@endphp
								
								<div class="me6 {{ $activeCssClass }}">
									<a href="{{ $dataInside -> url }}" target="{{ $dataInside -> urlTarget }}">
										<span>
											{{ $dataInside -> title }}
										</span>
									</a>
								</div>
							@endforeach
						</div>


						<div class="me9 mt-1">
							@foreach($data -> subMenuButtons as $dataInside)
								@php
									$activeCssClass = '';

									if($dataInside -> active) {
										$activeCssClass = 'me3';
									}
								@endphp
								
								<div class="me6 {{ $activeCssClass }}">
									<a href="{{ $dataInside -> url }}" target="{{ $dataInside -> urlTarget }}">
										<span>
											{{ $dataInside -> title }}
										</span>
									</a>
								</div>
							@endforeach
						</div>
					@endif
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