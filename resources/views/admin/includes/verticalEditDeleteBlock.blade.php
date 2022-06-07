<div class="p-2">
	<div class="d-flex align-items-center edit-block">
		<div class="col-2">
			<div style="background-image: url('{{ asset($imageUrl) }}');"
				 class="edit-block__image_div"></div>
		</div>

		<div class="col-8">
			<div class="row p-2">
				<div class="col-6">
					<div class="p-2 d-flex align-items-center">
						@if(isset($possibilityToEdit))
							@if($possibilityToEdit !== 0)
								<a href="{{ $editLink }}">
									<span class="line_max_1">
										{{ $title }}
									</span>
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
		
		<div class="col-2">
			<div class="d-flex justify-content-end">

				@if(isset($possibilityToEdit))
					@if($possibilityToEdit !== 0)
						<div class="text-right edit-block__edit-delete-block">
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
						<div class="text-right edit-block__edit-delete-block delete-block" data-delete-link="{{ $deleteLink }}">
							<div class="p-3">
								<img src="{{ asset('/storage/images/admin/close.svg') }}" alt="close" class="bar-tag-bigger-img">
							</div>
						</div>
					@endif
				@endif
			</div>
		</div>
	</div>
</div>