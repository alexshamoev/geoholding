@extends('master')


@section('pageMetaTitle')
    News123
@endsection


@section('content')
    <h1 class="p-2">
        NEWS page - 

		{{ $page -> title }}
    </h1>

    <div class="p-2">
		{!! $page -> text !!}
    </div>


	@foreach($newsStep0 as $data)
		<a href="{{ $data -> fullUrl }}">
			<div class="p-2">
				<div class="p-2">
					{{ $data -> title }}
				</div>

				<div class="p-2">
					{{ $data -> text }}
				</div>
			</div>
		</a>
	@endforeach
@endsection