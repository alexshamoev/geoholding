@section('menu')
    <h2 class="p-2">
        Menu
    </h2>


	@foreach($languages as $data)
		<div class="p-2">
			@if($data -> active)
				Active
			@endif

			<a href="{{ $data -> full_url }}">
				{{ $data -> full_title }}
			</a>
		</div>
	@endforeach

	<br>
	<br>

	@foreach($menuButtons as $data)
		<div class="p-2">
			<a href="{{ $data -> url }}">
				{{ $data -> title }}
			</a>
		</div>
	@endforeach
	<br>
	<br>
	<a href="/admin">
		Admin Panel
	</a>
@show