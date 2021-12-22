<div class="p-2 tags">
	@if(isset($tag0Text))
		<div class="d-flex align-items-center">
			@if(isset($tag0Url))
				<a href="{{ $tag0Url }}">
					<span class="p-2">
						{{ $tag0Text }}
					</span>
				</a>
			@else
				<span class="p-2">
					<span>
						{{ $tag0Text }}
					</span>
				</span>
			@endif

			<span class="p-2">
				<img src="{{ asset('/storage/images/admin/arrow_right.svg') }}" class="bar-tag-small-img">
			</span>

			@if(isset($tag1Text))
				@if(isset($tag1Url))
					<a href="{{ $tag1Url }}">
						<span class="p-2">
							{{ $tag1Text }}
						</span>
					</a>
				@else
					<span class="p-2">
						<span>
							{{ $tag1Text }}
						</span>
					</span>
				@endif

				<span class="p-2">
					<img src="{{ asset('/storage/images/admin/arrow_right.svg') }}" class="bar-tag-small-img">
				</span>
			@endif


			@if(isset($tag2Text))
				@if(isset($tag2Url))
					<a href="{{ $tag2Url }}">
						<span class="p-2">
							{{ $tag2Text }}
						</span>
					</a>
				@else
					<span class="p-2">
						<span>
							{{ $tag2Text }}
						</span>
					</span>
				@endif
				<span class="p-2">
					<img src="{{ asset('/storage/images/admin/arrow_right.svg') }}" class="bar-tag-small-img">
				</span>
			@endif


			@if(isset($tag3Text))
				@if(isset($tag3Url))
					<a href="{{ $tag3Url }}">
						<span class="p-2">
							{{ $tag3Text }}
						</span>
					</a>
				@else
					<span class="p-2">
						<span>
							{{ $tag3Text }}
						</span>
					</span>
				@endif
				<span class="p-2">
					<img src="{{ asset('/storage/images/admin/arrow_right.svg') }}" class="bar-tag-small-img">
				</span>
			@endif


			@if(isset($tag4Text))
				@if(isset($tag4Url))
					<a href="{{ $tag4Url }}">
						<span class="p-2">
							{{ $tag4Text }}
						</span>
					</a>
				@else
					<span class="p-2">
						<span>
							{{ $tag4Text }}
						</span>
					</span>
				@endif
				<span class="p-2">
					<img src="{{ asset('/storage/images/admin/arrow_right.svg') }}" class="bar-tag-small-img">
				</span>
			@endif
		</div>
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

</div>