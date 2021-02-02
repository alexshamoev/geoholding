<div class="p-2">
	@foreach($modules as $data)
		<div class="p-2">
			<a href="/admin/{{ $data -> alias }}">
				{{ $data -> alias }}
			</a>
		</div>
	@endforeach

	<div class="p-2">
		<a href="/admin/modules">
			Modules
		</a>
	</div>

	<div class="p-2">
		<a href="/admin/bsw">
			BSW
		</a>
	</div>

	<div class="p-2">
		<a href="/admin/bsc">
			BSC
		</a>
	</div>

	<div class="p-2">
		<a href="/admin/languages">
			Languages
		</a>
	</div>

	<div class="p-2">
		<a href="/admin/admins">
			Admins
		</a>
	</div>
</div>