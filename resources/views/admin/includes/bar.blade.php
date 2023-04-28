<div class="row bar">
	@if(isset($backRoute))
		<div class="col-8 p-2 d-flex align-items-center">
			<a href="{{ $backRoute }}" class="d-inline-block">
				<div class="d-flex align-items-center">
					<div class="p-2">
						<img src="{{ asset('/storage/images/admin/arrow_left.svg') }}" alt="arrow_left" class="bar-tag-small-img">
					</div>

					<div class="p-2">
						<span>გასვლა</span>
					</div>
				</div>
			</a>
		</div>
	@else
		<div class="col-8 p-0">
			<div class="d-flex align-items-center pl-2">
				<span>გასვლა</span>
			</div>
		</div>
	@endif

	<div class="col-4 p-0">
		<div class="d-flex align-items-center justify-content-end">
			@if($prevId)
				<a href="{{ $prevRoute }}">
					<div class="p-3 bar__button">
						<img src="{{ asset('/storage/images/admin/arrow_left.svg') }}" alt="arrow_left" class="bar-tag-big-img">
					</div>
				</a>
			@else
				<div class="p-3 bar__button">
					<img src="{{ asset('/storage/images/admin/arrow_left.svg') }}" alt="arrow_left" class="bar-tag-big-img bar-tag-big-img--disabled">
				</div>
			@endif


			@if($nextId)
				<a href="{{ $nextRoute }}">
					<div class="p-3 bar__button">
						<img src="{{ asset('/storage/images/admin/arrow_right.svg') }}" alt="arrow_left" class="bar-tag-big-img">
					</div>
				</a>
			@else
				<div class="p-3 bar__button">
					<img src="{{ asset('/storage/images/admin/arrow_right.svg') }}" alt="arrow_left" class="bar-tag-big-img bar-tag-big-img--disabled">
				</div>
			@endif


			@if(isset($addUrl))
				<a href="{{ $addUrl }}">
					<div class="p-3 bar__button">
						<img src="{{ asset('/storage/images/admin/plus.svg') }}" alt="plus" class="bar-tag-big-img">
					</div>
				</a>
			@endif


			@if(isset($deleteUrl))
				<div class="p-3 bar__button bar__delete_button">
					{{ Form::open(array('url' => $deleteUrl, 'method' => 'delete')) }}
					{{ Form::close() }}

					<img src="{{ asset('/storage/images/admin/close.svg') }}" alt="close" class="bar-tag-big-img">
				</div>
			@endif
		</div>
	</div>
</div>