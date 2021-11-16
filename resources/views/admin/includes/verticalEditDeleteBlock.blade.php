<div class="p-2">
	<div class="d-flex align-items-center edit-block">
		<div class="col-2 p-0">
			<div style="background-image: url('{{ asset('/storage/images/modules/'.$moduleAlias.'/'.$id.'.jpg') }}');"
				 class="edit-block__image_div"></div>
		</div>

		<div class="col-8 p-0">
			<div class="row">
				<div class="col-6">
					<div class="p-2 d-flex align-items-center">
						<a href="{{ $editLink }}">
							<span class="line_max_1">
								{{ $title }}
							</span>
						</a>
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
		
		<div class="col-2 p-0">
			<div class=" d-flex justify-content-end">
				<div class="text-right edit-block__edit-delete-block">
					<a href="{{ $editLink }}">
						<div class="p-3">
							<img src="{{ asset('/storage/images/admin/edit.svg') }}" alt="edit" class="bar-tag-bigger-img">
						</div>
					</a>
				</div>

				<div class="text-right edit-block__edit-delete-block delete-block" data-delete-link="{{ $deleteLink }}">
					<div class="p-3">
						<img src="{{ asset('/storage/images/admin/close.svg') }}" alt="close" class="bar-tag-bigger-img">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>