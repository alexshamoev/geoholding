<div class="p-2
			languages
            d-flex
            justify-content-end
			align-items-center
			text-white">
	<button class="btn
					dropdown-toggle 
					languages__dropdown
					d-flex
					align-items-center
					m-0
                    p-0
                    px-3
					outline-none
					shadow-none" 
					type="button" 
					id="dropdownMenuButton1" 
					data-bs-toggle="dropdown" 
					aria-expanded="false">
		<!-- active en  -->
	</button>
		
	<ul class="dropdown-menu languages__dropdown_menu p-0 border-0 bg-transparent" aria-labelledby="dropdownMenuButton1">
		@foreach($languages as $data)
			@if($data -> isActive)
				<div class="languages__block
							languages__block--active
							col-12
							text-center
							d-flex
							justify-content-start
							dropdown-item
							d-none"
							data-id="ssss">
                    <div>
                        <img class="languages__flag" src="{{ asset('/storage/images/modules/languages/'.$data->id.'.svg') }}" alt="{{ $data->full_title }}" >
                    </div>	

                    <div class="p-2 d-flex align-items-center justify-content-center">
						<div>
							{{ $data -> full_title }}
						</div>

                        <span class="ba_arrow_down ps-2"></span>
					</div>
				</div>
			@else
				<div class="languages__block
							col-12
							py-0
							text-center
							d-flex
							justify-content-start
							dropdown-item">
					<a href="{{ $data -> fullUrl }}">
						<div class="d-flex align-items-center">
                            <img class="languages__flag" src="{{ asset('/storage/images/modules/languages/'.$data->id.'.svg') }}" alt="{{ $data->full_title }}" >
							
							<div class="p-2">
								{{ $data -> full_title }}
							</div>
						</div>
					</a>
				</div>
			@endif
		@endforeach
	</ul>
</div>
