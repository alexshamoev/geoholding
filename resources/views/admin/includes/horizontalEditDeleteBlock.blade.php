<div class="p-2">
	<div class="d-flex align-items-center edit-block">
		<div class="col-10 p-0">
			<div class="p-3">
				<a href="{{ $editLink }}">
					{{ $title }}
				</a>
			</div>
		</div>
		
		<div class="col-2 p-0">
			<div class=" d-flex justify-content-end">
				@if(isset($text))
					<div  class="text-right edit-block__edit-delete-block p-2 d-flex align-items-center">
						<span>{{ $text }}</span>
					</div>
				@endif

				<div class="text-right edit-block__edit-delete-block">
					<a href="{{ $editLink }}">
						<div class="p-3">
							<img src="{{ asset('/images/admin/edit.svg') }}" alt="edit" class="bar-tag-bigger-img">
						</div>
					</a>
				</div>

				<div class="text-right edit-block__edit-delete-block">
					<a href="{{ $deleteLink }}">
						<div class="p-3">
							<img src="{{ asset('/images/admin/close.svg') }}" alt="close" class="bar-tag-bigger-img">
						</div>
					</a>
				</div>

				
				<div class="text-right edit-block__edit-delete-block">
					<div class="p-3">
						<img src="{{ asset('/images/admin/bars.svg') }}" alt="bars" class="bar-tag-bigger-img">
					</div>
				</div>

			</div>
		</div>
	</div>
</div>