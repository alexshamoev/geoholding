<div class="p-2 col-3">
	<div class="row p-2 edit-block">
		<div class="col-12">
			<div style="background-image: url('{{ asset('/images/modules/'.$moduleAlias.'/'.$id.'.jpg') }}');"
				 class="edit-block__image_div"></div>
		</div>

		<div class="col-12">
			<a href="{{ $editLink }}">
				<span class="line_max_1">
					{{ $title }}
				</span>
			</a>
		</div>

		<div class="col-6 text-center">
			<a href="{{ $editLink }}">
				<img src="{{ asset('/images/admin/edit.svg') }}" alt="Edit" class="bar-tag-bigger-img">
			</a>
		</div>

		<div class="col-6 text-center">
			<img src="{{ asset('/images/admin/close.svg') }}" alt="Delete" class="bar-tag-bigger-img">
		</div>
	</div>
</div>