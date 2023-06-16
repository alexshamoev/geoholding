
<div class="d-flex justify-content-around">
	@foreach ($companies as $item)
		{{ $item->fullUrl }}
		<a href="{{ $item->fullUrl }}">
			<h1>{{ $item->title }}</h1>
		</a>
	@endforeach
</div>
