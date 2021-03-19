<div class="p-2 tags">
@if(isset($tag0Text))
	<div class="d-flex align-items-center">
		@if(isset($tag0Url))
			<a href="{{ $tag0Url }}">
				<div class="p-2">
					{{ $tag0Text }}
				</div>
			</a>
		@else
			<div class="p-2">
				<span>
					{{ $tag0Text }}
				</span>
			</div>
		@endif

		<div class="p-2">
			<img src="{{ asset('/images/admin/arrow_right.svg') }}" alt="arrow_right" class="bar-tag-small-img bar-tag-small-img--tags__arrow">
		</div>
		@if(isset($tag1Text))

		@if(isset($tag1Url))
			<a href="{{ $tag1Url }}">
				<div class="p-2">
					{{ $tag1Text }}
				</div>
			</a>
		@else
			<div class="p-2">
				<span>
					{{ $tag1Text }}
				</span>
			</div>
		@endif
			<div class="p-2">
				<img src="{{ asset('/images/admin/arrow_right.svg') }}" alt="arrow_right" class="bar-tag-small-img bar-tag-small-img--tags__arrow">
			</div>
		@endif


		@if(isset($tag2Text))
			@if(isset($tag2Url))
				<a href="{{ $tag2Url }}">
					<div class="p-2">
						{{ $tag2Text }}
					</div>
				</a>
			@else
				<div class="p-2">
					<span>
						{{ $tag2Text }}
					</span>
				</div>
			@endif
			<div class="p-2">
				<img src="{{ asset('/images/admin/arrow_right.svg') }}" alt="arrow_right" class="bar-tag-small-img tags__arrow">
			</div>
		@endif


		@if(isset($tag3Text))
			@if(isset($tag3Url))
				<a href="{{ $tag3Url }}">
					<div class="p-2">
						{{ $tag3Text }}
					</div>
				</a>
			@else
				<div class="p-2">
					<span>
						{{ $tag3Text }}
					</span>
				</div>
			@endif
			<div class="p-2">
				<img src="{{ asset('/images/admin/arrow_right.svg') }}" alt="arrow_right" class="bar-tag-small-img tags__arrow">
			</div>
		@endif


		@if(isset($tag4Text))
			@if(isset($tag4Url))
				<a href="{{ $tag4Url }}">
					<div class="p-2">
						{{ $tag4Text }}
					</div>
				</a>
			@else
				<div class="p-2">
					<span>
						{{ $tag4Text }}
					</span>
				</div>
			@endif
			<div class="p-2">
				<img src="{{ asset('/images/admin/arrow_right.svg') }}" alt="arrow_right" class="bar-tag-small-img tags__arrow">
			</div>
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