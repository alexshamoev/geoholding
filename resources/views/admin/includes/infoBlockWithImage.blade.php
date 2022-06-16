<div class="p-2 blockWithRang" data-id="{{ $id }}">
	<div class="row align-items-stretch edit-block">
		<div class="col-2">
			@if(isset($multiDeleteCheckbox))
				@if($multiDeleteCheckbox !== 0)
					<input type="checkbox" name="checkbox[]" value="{{ $id }}" id="">
				@endif
			@endif

			<div style="background-image: url('{{ asset($imageUrl) }}');"
				 class="edit-block__image_div"></div>
		</div>

		<div class="col-7">
			<div class="row h-100">
				<div class="col-6 p-2 d-flex align-items-center">
					<div class="p-2 d-flex align-items-center">
						@if(isset($possibilityToEdit))
							@if($possibilityToEdit !== 0)
								<a href="{{ $editLink }}">
							@endif
						@endif
							<span class="line_max_1">
								{{ $title }}
							</span>
						@if(isset($possibilityToEdit))
							@if($possibilityToEdit !== 0)
								</a>
							@endif
						@endif
					</div>
				</div>

				<div class="col-6 d-flex align-items-center">
					@if(isset($text))
						<div  class="p-2 d-flex align-items-center">
							<span class="line_max_1">{{ $text }}</span>
						</div>
					@endif
				</div>
			</div>
		</div>
		
		<div class="col-3">
			<div class="row h-100 d-flex justify-content-end">

				@if(isset($possibilityToEdit))
					@if($possibilityToEdit !== 0)
						<div class="col-4 d-flex align-items-center justify-content-center text-right edit-block__edit-delete-block">
							<a href="{{ $editLink }}">
								<div class="p-3">
									<img src="{{ asset('/storage/images/admin/edit.svg') }}" alt="edit" class="bar-tag-bigger-img">
								</div>
							</a>
						</div>
					@endif
				@endif

				@if(isset($possibilityToDelete))
					@if($possibilityToDelete !== 0)
						<div class="col-4 d-flex align-items-center justify-content-center text-right edit-block__edit-delete-block delete-block" data-delete-link="{{ $deleteLink }}">
							<div class="p-3">
								<img src="{{ asset('/storage/images/admin/close.svg') }}" alt="close" class="bar-tag-bigger-img">
							</div>
						</div>
					@endif
				@endif

				@if(isset($possibilityToRang))
					@if($possibilityToRang !== 0)
						<div class="col-4 d-flex align-items-center justify-content-center text-right edit-block__edit-delete-block edit-block__edit-delete-block--move rangButton">
							<div class="p-3">
								<img src="{{ asset('/storage/images/admin/bars.svg') }}" alt="Move" class="bar-tag-bigger-img">
							</div>
						</div>
					@endif
				@endif
			</div>
		</div>
	</div>
</div>