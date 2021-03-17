<div class="menu">
	@foreach($modules as $data)
		<style>
			.menu__link {
				transition: .2s all ease-in-out;
				background-color: transparent;
			}

			.menu__link--{{$data -> alias}} {
				border: 1px solid {{ $data -> icon_bg_color }};
				border-left-width: 7px;
				border-top: none;
				border-right: none;
			}

			.menu__link--{{$data -> alias}} svg {
				width: 100%;
			}

			.menu__link--{{$data -> alias}} svg *{
				fill: {{ $data -> icon_bg_color }};
			}

			.menu__link--{{$data -> alias}}:hover svg * {
				fill: #fff;
			}

			.menu__link--{{$data -> alias}}:hover {
				background-color: {{ $data -> icon_bg_color }};
				color: #fff;
			}

			.divider {
				width: 100%;
				height: 1px;
				background-color: #ccc;
			}			
		</style>

		<a href="/admin/{{ $data -> alias }}">
			<div class="row align-items-center p-1 menu__link menu__link--{{$data -> alias}}">
				<div class="col-3">
					<img src="{{ asset('/images/modules/modules/'.$data -> id.'_icon.svg') }}" alt="menu_icon" width="30" height="30" class="svg_img">
				</div>

				<div class="col-9">
					<span>{{ $data -> alias }}</span>
				</div>
			</div>
		</a>
	@endforeach

	<div class="py-3">
	</div>

	<div class="p-2">
		<a href="/admin/modules">
			<div class="d-flex align-items-center px-2">
				<div class="p-2">
					<span>Modules</span>
				</div>
			</div>
		</a>

		<a href="/admin/bsw">
			<div class="d-flex align-items-center px-2">
				<div class="p-2">
					<span>BSW</span>
				</div>
			</div>
		</a>

		<a href="/admin/bsc">
			<div class="d-flex align-items-center px-2">
				<div class="p-2">
					<span>BSC</span>
				</div>
			</div>
		</a>

		<a href="/admin/languages">
			<div class="d-flex align-items-center px-2">
				<div class="p-2">
					<span>Languages</span>
				</div>
			</div>
		</a>

		<a href="/admin/admins">
			<div class="d-flex align-items-center px-2">
				<div class="p-2">
					<span>Admins</span>
				</div>
			</div>
		</a>
	</div>
</div>