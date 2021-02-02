<div class="row">
	<div class="col-8"></div>


	@if($prevId)
		<div class="col-1">
			<a href="{{ $prevRoute }}">
				Prev
			</a>
		</div>
	@else
		<div class="col-1">
			Prev
		</div>
	@endif


	@if($nextId)
		<div class="col-1">
			<a href="{{ $nextRoute }}">
				Next
			</a>
		</div>
	@else
		<div class="col-1">
			Next
		</div>
	@endif


	@if($addUrl)
		<div class="col-1">
			<a href="{{ $addUrl }}">
				Add
			</a>
		</div>
	@endif


	@if($deleteUrl)
		<div class="col-1">
			<a href="{{ $deleteUrl }}">
				Delete
			</a>
		</div>
	@endif
</div>