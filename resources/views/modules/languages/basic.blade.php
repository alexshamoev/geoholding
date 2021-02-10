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