<div class="p-2
			languages
			row
			align-items-center">
	@foreach($languages as $data)
		@if($data -> isActive)
			<div class="languages__block
						languages__block--active
						col-4
						text-center">
				<div class="p-2">
					<img src="{{ asset('/storage/images/modules/languages/'.$data -> id.'.svg') }}" alt="{{ $data -> full_title }}" >
				</div>

				<div class="p-1
							d-lg-block
							d-none">
					{{ $data -> full_title }}
				</div>
			</div>
		@else
			<div class="languages__block
						col-4
						text-center">
				<a href="{{ $data -> fullUrl }}">
					<div class="p-2">
						<img src="{{ asset('/storage/images/modules/languages/'.$data -> id.'.svg') }}" alt="{{ $data -> full_title }}" >
					</div>

					<div class="p-1
								d-lg-block
								d-none">
						{{ $data -> full_title }}
					</div>
				</a>
			</div>
		@endif
	@endforeach
</div>