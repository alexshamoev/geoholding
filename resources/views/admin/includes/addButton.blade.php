<div class="p-2">
	<a href="{{ $url }}" title="{{ $text }}">
		<div class="p-2 d-flex justify-content-center align-items-center addButton">
			<div class="p-2">
				<img src="{{ asset('/images/admin/plus.svg') }}"
					 alt="{{ $text }}"
					 class="bar-tag-bigger-img">
			</div>

			<div class="p-2">
				{{ $text }}
			</div>
		</div>
	</a>
</div>