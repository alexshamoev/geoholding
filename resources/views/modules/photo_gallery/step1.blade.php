@extends('master')


@section('pageMetaTitle')
    News Step 0
@endsection


@section('content')
    <h1 class="p-2">
        {{ $activeNews -> alias }}
    </h1>

	<div class="p-2">
		{{ $activeNews -> title }}
	</div>

	<div class="p-2">
		{{ $activeNews -> text }}
	</div>
@endsection