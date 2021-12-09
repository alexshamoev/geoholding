<header>
	<div class="row p-2 align-items-center">
		<div class="col-1">
			<div class="p-2">
				<img src="{{ asset('/storage/images/admin/logo.svg') }}" alt="HobbyStudio">
			</div>
		</div>

		<div class="col-3">
			<div class="p-2">
				<span class="header__cms-version">CMS</span>
				<span class="header__cms-version-numbers">v2.9.4</span>
			</div>

			<div class="p-2">
				<span>Created by <a href="http://hobbystudio.ge/" target="_blank">HobbyStudio</a></span>
			</div>
		</div>

		<div class="col-8 text-right">
			<a href="{{ route('logout') }}">
				Logout
			</a>

			<div class="p-2">
				მოგესალმებით

				<a href="{{ route('adminEdit', $activeUser -> id) }}">
					{{ $activeUser -> name }}
				</a>
			</div>
			<a href="/" target="_blank">
				<div class="p-2">
					<span>გადასვლა საიტზე</span>
				</div>
			</a>
		</div>
	</div>
</header>