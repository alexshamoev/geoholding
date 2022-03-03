@if($widgetGetVisibility['menu_buttons'])
	<div class="navbar-collapse
				collapse
				justify-content-center
				menu_buttons" id="navbar">
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
							menu_buttons__item
							position-relative
							js_menu_buttons__item">
					@php
						$activeCssClass = '';

						if($data -> active) {
							$activeCssClass = 'menu_buttons__active_item_block';
						}
					@endphp
					
					<div class="d-block
								py-2
								px-4
								{{ $activeCssClass }}"> 
						@if($data -> url)
							<a href="{{ $data -> url }}" target="{{ $data -> urlTarget }}">
						@endif

						<span>
							{{ $data -> title }}
						</span>
						
						@if($data -> url)
							</a>
						@endif

						<div class="js_arrow_div
									d-inline-block
									menu_buttons__arrow_block">
							<span class="ba_thin_arrow_right"></span>
						</div>
					</div>

					@if(count($data -> subMenus))
						<div class="menu_buttons__slide_down_block mt-3">
							@foreach($data -> subMenus as $dataInside)
								@php
									$activeCssClass = '';

									if($dataInside -> active) {
										$activeCssClass = 'menu_buttons__sub_menu_item--active';
									}
								@endphp
								
								<div class="menu_buttons__sub_menu_item {{ $activeCssClass }}">
									@if($dataInside -> url)
										<a href="{{ $dataInside -> url }}" target="{{ $dataInside -> urlTarget }}">
											<span>
												{{ $dataInside -> title }}
											</span>
										</a>
									@else
										<span>
											{{ $dataInside -> title }}
										</span>
									@endif
								</div>
							@endforeach
						</div>


						<div class="menu_buttons__slide_down_block_in_burger mt-1">
							@foreach($data -> subMenus as $dataInside)
								@php
									$activeCssClass = '';

									if($dataInside -> active) {
										$activeCssClass = 'menu_buttons__sub_menu_item--active';
									}
								@endphp
								
								<div class="menu_buttons__sub_menu_item {{ $activeCssClass }}">
									@if($dataInside -> url)
										<a href="{{ $dataInside -> url }}" target="{{ $dataInside -> urlTarget }}">
											<span>
												{{ $dataInside -> title }}
											</span>
										</a>
									@else
										<span>
											{{ $dataInside -> title }}
										</span>
									@endif
								</div>
							@endforeach
						</div>
					@endif
				</div>
			@endforeach
		</div>
	</div>
@endif