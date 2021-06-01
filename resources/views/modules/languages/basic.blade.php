{{--@if($widgetGetVisibility['languages'])--}}
	<div class="p-2 languages row align-items-center">
		@foreach($languages as $data)
			@if($data -> active)
				<div class="languages__lang languages__lang--active col-4 d-flex justify-content-center">
					{{ $data -> full_title }}
				</div>
			@else
				<div class="languages__lang col-4 d-flex justify-content-center">
					<a href="{{ $data -> full_url }}">
						{{ $data -> full_title }}
					</a>
				</div>
			@endif
		@endforeach
	</div>
{{--@endif--}}