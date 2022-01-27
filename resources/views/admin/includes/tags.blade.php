<div class="px-3 py-2 tags">
	@if(isset($tag0Text))
		<div class="tags_wrapper">
			@if(isset($tag0Url))
				<a href="{{ $tag0Url }}">
					<span class="">
						{{ $tag0Text }}
					</span>
				</a>
			@else
				{{ $tag0Text }}
			@endif


			@if(isset($tag1Text))
				<span class="p-2">
					<img src="{{ asset('/storage/images/admin/arrow_right.svg') }}" class="bar-tag-small-img">
				</span>
				
				@if(isset($tag1Url))
					<a href="{{ $tag1Url }}">
						{{ $tag1Text }}
					</a>
				@else
					@if($tag1Text)
						{{ $tag1Text }}sss
					@else
						-- Empty --
					@endif
				@endif
			@endif


			@if(isset($tag2Text))
				<span class="p-2">
					<img src="{{ asset('/storage/images/admin/arrow_right.svg') }}" class="bar-tag-small-img">
				</span>

				@if(isset($tag2Url))
					<a href="{{ $tag2Url }}">
						{{ $tag2Text }}
					</a>
				@else
					@if($tag2Text)
						{{ $tag2Text }}
					@else
						-- Empty --
					@endif
				@endif
			@endif


			@if(isset($tag3Text))
				<span class="p-2">
					<img src="{{ asset('/storage/images/admin/arrow_right.svg') }}" class="bar-tag-small-img">
				</span>

				@if(isset($tag3Url))
					<a href="{{ $tag3Url }}">
						{{ $tag3Text }}
					</a>
				@else
					@if($tag3Text)
						{{ $tag3Text }}
					@else
						-- Empty --
					@endif
				@endif
			@endif


			@if(isset($tag4Text))
				<span class="p-2">
					<img src="{{ asset('/storage/images/admin/arrow_right.svg') }}" class="bar-tag-small-img">
				</span>

				@if(isset($tag4Url))
					<a href="{{ $tag4Url }}">
						{{ $tag4Text }}
					</a>
				@else
					@if($tag4Text)
						{{ $tag4Text }}
					@else
						-- Empty --
					@endif
				@endif
			@endif
		</div>
	@endif
</div>