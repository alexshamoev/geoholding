<div class="p-2 blockWithRang" data-id="{{ $id }}">
	<div class="d-flex align-items-center edit-block">
		<div class="col-10">
			<div class="row">
				<div class="col-4 p-2 d-flex align-items-center">
					@if(isset($possibilityToMultyDelete))
						@if($possibilityToMultyDelete !== 0)
							<label>
								<div class="py-2 ps-2 pe-1 d-inline-block">
									<input type="checkbox"
											name="checkbox[]"
											value="{{ $id }}"
											class="m-0 checkbox_child">
								</div>
							</label>
						@endif
					@endif

					<div class="p-2 d-inline-block">
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

				<div class="col-4 p-2 d-flex align-items-center">
					<div class="p-2 d-flex align-items-center">
						<span class="line_max_1">
							@if(isset($text))
								{{ $text }}
							@endif
						</span>
					</div>
				</div>

				<div class="col-4 d-flex align-items-center">
					<div class="p-2 d-flex align-items-center">
						<span class="line_max_1">
							@if(isset($text1))
								{{ $text1 }}
							@endif
						</span>
					</div>
				</div>
			</div>
		</div>

		<div class="col-2">
			<div class="d-flex justify-content-end">

				@if(isset($possibilityToEdit))
					@if($possibilityToEdit !== 0)
						<div class="edit-block__edit-delete-block p-2">
							<a href="{{ $editLink }}">
								<div class="p-2">
									<img src="{{ asset('/storage/images/admin/edit.svg') }}" alt="edit" class="bar-tag-bigger-img">
								</div>
							</a>
						</div>
					@endif
				@endif

				@if(isset($possibilityToDelete))
					@if($possibilityToDelete !== 0)
						<div class="edit-block__edit-delete-block p-2 delete-block">
							{{ Form::open(array('url' => $deleteLink, 'method' => 'delete')) }}
							{{ Form::close() }}

							<div class="p-2">
								<img src="{{ asset('/storage/images/admin/close.svg') }}" alt="close" class="bar-tag-bigger-img">
							</div>
						</div>
					@endif
				@endif

				@if(isset($possibilityToRang))
					@if($possibilityToRang !== 0)
						<div class="edit-block__edit-delete-block p-2 edit-block__edit-delete-block--move rangButton">
							<div class="p-2">
								<img src="{{ asset('/storage/images/admin/bars.svg') }}" alt="Move" class="bar-tag-bigger-img">
							</div>
						</div>
					@endif
				@endif

			</div>
		</div>
	</div>
</div>
