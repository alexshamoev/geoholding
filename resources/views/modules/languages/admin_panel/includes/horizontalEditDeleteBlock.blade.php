<div class="p-2 blockWithRang" data-id="{{ $id }}">
	<div class="d-flex align-items-center edit-block">
		<div class="col-10 p-0">
			<div class="p-2 row">
				<div class="col-6">
					<a href="{{ $editLink }}">
						<span class="line_max_1">
							{{ $title }}
						</span>
					</a>
				</div>

				<div class="col-3">
					<!-- <div class="col-3 p-3 checkbox-block"> -->
						<label>
							{{ Form :: radio('like_default', $id, $like_default) }}
							&nbsp;
							Default for front?
						</label>
					<!-- </div> -->
				</div>

				<div class="col-3">
					<!-- <div class="col-3 p-3 checkbox-block"> -->
						<label>
							{{ Form :: radio('like_default_for_admin', $id, $like_default_for_admin) }}
							&nbsp;
							Default for admin?
						</label>
					<!-- </div> -->
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
				
				<div class="text-right edit-block__edit-delete-block edit-block__edit-delete-block--move">
					<div class="p-3">
						<img src="{{ asset('/images/admin/bars.svg') }}" alt="bars" class="bar-tag-bigger-img">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
