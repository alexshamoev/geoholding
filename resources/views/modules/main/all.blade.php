
<div class="d-flex justify-content-around">
	@foreach ($companies as $item)
	
		<a href="{{ $item->fullUrl }}">
			@if (file_exists(public_path('storage/images/modules/companies/79/' . $item->id . '.jpg')))
				<img class="w-25" src="{{ asset('storage/images/modules/companies/79/' . $item->id . '.jpg') }}" alt="{{ $item->title }}" style="background-color: black">
			@endif

			@if (file_exists(public_path('storage/images/modules/companies/79/' . $item->id . '.svg')))
				<img class="w-25" src="{{ asset('storage/images/modules/companies/79/' . $item->id . '.svg') }}" alt="{{ $item->title }}" style="background-color: black">
			@endif
			
			<h1>{{ $item->title }}</h1>
		</a>
	
	@endforeach
</div>
