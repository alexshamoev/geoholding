<div class="menu">
	@foreach($modules as $data)
		<style>
			.menu__link {
				transition: .2s all ease-in-out;
				background-color: transparent;
			}

			.menu__link--{{$data -> alias}}:hover {
				background-color: {{ $data -> icon_bg_color }};
				color: #fff;
			}
		</style>

		<a href="/admin/{{ $data -> alias }}">
			<div class="d-flex align-items-center px-2 menu__link menu__link--{{$data -> alias}}">
				<div class="p-2">
					<img src="{{ asset('/images/modules/modules/'.$data -> id.'_icon.svg') }}" alt="menu_icon" width="30" height="30" class="svg_img">
				</div>

				<div class="p-2">
					<span>{{ $data -> alias }}</span>
				</div>
			</div>
		</a>
	@endforeach

	<div>
		<hr>
	</div>

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