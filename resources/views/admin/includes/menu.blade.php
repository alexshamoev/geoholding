<div class="menu py-2">
	@foreach($modules as $data)
	<a href="/admin/{{ $data -> alias }}">
		<div class="d-flex align-items-center px-2">
			<div class="p-2">
				icon
			</div>

			<div class="p-2">
				<span>{{ $data -> alias }}</span>
			</div>
		</div>
	</a>
	@endforeach

	<a href="/admin/modules">
		<div class="d-flex align-items-center px-2">
			<div class="p-2">
				icon
			</div>

			<div class="p-2">
				<span>Modules</span>
			</div>
		</div>
	</a>

	<a href="/admin/bsw">
		<div class="d-flex align-items-center px-2">
			<div class="p-2">
				icon
			</div>

			<div class="p-2">
				<span>BSW</span>
			</div>
		</div>
	</a>

	<a href="/admin/bsc">
		<div class="d-flex align-items-center px-2">
			<div class="p-2">
				icon
			</div>

			<div class="p-2">
				<span>BSC</span>
			</div>
		</div>
	</a>

	<a href="/admin/languages">
		<div class="d-flex align-items-center px-2">
			<div class="p-2">
				icon
			</div>

			<div class="p-2">
				<span>Languages</span>
			</div>
		</div>
	</a>

	<a href="/admin/admins">
		<div class="d-flex align-items-center px-2">
			<div class="p-2">
				icon
			</div>

			<div class="p-2">
				<span>Admins</span>
			</div>
		</div>
	</a>
</div>