@if($widgetGetVisibility['partners'])
	<div class="container p-2 partners">
		<h1 class="p-2">
			Partners widget
		</h1>

		<div class="row">
			@foreach($partners as $data)
				<div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3 partners__partner">
					<a href="{{ $data -> link }}" target="_blank">
						<div class="p-2">
							<img src="{{ asset('/storage/images/modules/partners/'.$data -> id.'.jpg') }}" alt="{{ $data -> title }}">
						</div>
						
						<div class="p-2 text-center partners__title">
							<h3 class="line_max_3">
								{{ $data -> title }}
							</h3>
						</div>
					</a>
				</div>
			@endforeach
		</div>
	</div>
@endif