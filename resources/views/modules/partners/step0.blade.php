@if($widgetGetVisibility['partners'])
	<div class="container">
		<h1 class="p-2">
			Partners widget
		</h1>

		<div class="row">
			@foreach($partners as $data)
				<div class="col-3">
					<a href="{{ $data -> link }}" target="_blank">
						<div class="p-2">
							<img src="{{ asset('/images/modules/partners/'.$data -> id.'.jpg') }}" alt="{{ $data -> title }}">
						</div>
						
						<div class="p-2">
							{{ $data -> title }}
						</div>
					</a>
				</div>
			@endforeach
		</div>
	</div>
@endif