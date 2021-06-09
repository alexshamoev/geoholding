@if($widgetGetVisibility['partners'])
	<div class="container">
		<h1 class="p-2">
			Partners widget
		</h1>


		@foreach($partners as $data)
			<a href="{{ $data -> link }}" target="_blank">
				<div class="p-2">
					<div class="p-2">
						{{ $data -> title }}
					</div>
				</div>
			</a>
		@endforeach
	</div>
@endif