<!-- <div> -->
<div class="p-2 panel1 panel-info1">
<!-- <div class="p-2 ui-state-default sortable-item"> -->
	<div class="d-flex align-items-center edit-block">
		<div class="col-10 p-0">
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
							<img src="{{ asset('/images/admin/edit.svg') }}" alt="edit" class="bar-tag-bigger-img">
						</div>
					</a>
				</div>

				<div class="text-right edit-block__edit-delete-block delete-block" data-delete-link="{{ $deleteLink }}">
					<div class="p-3">
						<img src="{{ asset('/images/admin/close.svg') }}" alt="close" class="bar-tag-bigger-img">
					</div>
				</div>

				<div class="text-right edit-block__edit-delete-block edit-block__edit-delete-block--move panel-heading">
					<div class="p-3">
						<img src="{{ asset('/images/admin/bars.svg') }}" alt="bars" class="bar-tag-bigger-img">
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- </div> -->