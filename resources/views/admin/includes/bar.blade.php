<div class="row">
	@if(isset($backRoute))
		<div class="col-1">
			<a href="{{ $backRoute }}">
				გასვლა
			</a>
		</div>
	@else
		<div class="col-1">
			გასვლა
		</div>
	@endif


	<div class="col-7"></div>


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


	@if(isset($addUrl))
		<div class="col-1">
			<a href="{{ $addUrl }}">
				Add
			</a>
		</div>
	@endif


	@if(isset($deleteUrl))
		<div class="col-1">
			<a href="{{ $deleteUrl }}">
				Delete
			</a>
		</div>
	@endif
</div>