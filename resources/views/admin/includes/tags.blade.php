<div class="p-2">
@if(isset($tag0Text))
	@if(isset($tag0Url))
		<a href="{{ $tag0Url }}">
			{{ $tag0Text }}
		</a>
	@else
		{{ $tag0Text }}
	@endif

	>
@endif


<!-- @if(isset($tag0ArrowData))
<div>
	@foreach($tag0ArrowData as $data)
		{{ $data -> id }}
	@endforeach
</div>

	@if(isset($tag0Url))
		<a href="{{ $tag0Url }}">
			{{ $tag0Text }}
		</a>
	@else
		{{ $tag0Text }}
	@endif 
@else
	>
@endif-->


@if(isset($tag1Text))
	@if(isset($tag1Url))
		<a href="{{ $tag1Url }}">
			{{ $tag1Text }}
		</a>
	@else
		{{ $tag1Text }}
	@endif
	
	>
@endif


@if(isset($tag2Text))
	@if(isset($tag2Url))
		<a href="{{ $tag2Url }}">
			{{ $tag2Text }}
		</a>
	@else
		{{ $tag2Text }}
	@endif
	
	>
@endif


@if(isset($tag3Text))
	@if(isset($tag3Url))
		<a href="{{ $tag3Url }}">
			{{ $tag3Text }}
		</a>
	@else
		{{ $tag3Text }}
	@endif
	
	>
@endif


@if(isset($tag4Text))
	@if(isset($tag4Url))
		<a href="{{ $tag4Url }}">
			{{ $tag4Text }}
		</a>
	@else
		{{ $tag4Text }}
	@endif
	
	>
@endif

</div>