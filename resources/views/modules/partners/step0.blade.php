@extends('layouts.master')


@section('pageMetaTitle')
	{{ $page -> title }}
@endsection


@section('content')
	<h1 class="p-2">
		Partners page - 

		{{ $page -> title }}
	</h1>

	<div class="p-2">
		{{ $page -> text }}
	</div>

	{{ $page -> slug }}

	@foreach($partners as $data)
		<a href="#">
			<div class="p-2">
				<div class="p-2">
					{{ $data -> title }}
				</div>
			</div>
		</a>
	@endforeach
@endsection