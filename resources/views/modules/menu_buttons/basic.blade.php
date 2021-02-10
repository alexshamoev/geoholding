@foreach($menuButtons as $data)
	<div class="p-2">
		<a href="{{ $data -> url }}">
			{{ $data -> title }}
		</a>
	</div>
@endforeach