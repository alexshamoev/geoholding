<div class="px-3 py-2 tags">
	<div class="tags_wrapper">
		@php 
			$i = 0;
		@endphp

		@foreach($tagsData as $data)
			@if($i > 0)
				<span class="p-2">
					<img src="{{ asset('/storage/images/admin/arrow_right.svg') }}" class="bar-tag-small-img">
				</span>
			@endif

			@if(array_key_exists('tagUrl', $data))
				<a href="{{ $data['tagUrl'] }}">
					{{ $data['tagText'] }}
				</a>
			@else
				{{ $data['tagText'] }}
			@endif

			@php 
				$i++;
			@endphp
		@endforeach
	</div>
</div>