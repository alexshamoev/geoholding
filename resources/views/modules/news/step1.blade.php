@extends('master')


@section('pageMetaTitle')
    News Step 0
@endsection


@section('content')
	<div class="p-2">
		<a href="{{ '/'.$language -> title.'/'.$page -> alias }}">
        	{{ $page -> title }}
		</a>
		>
        {{ $activeNews -> title }}
    </div>
	
	
	<h1 class="p-2">
        {{ $activeNews -> alias }}
    </h1>

	<div class="p-2">
		{{ $activeNews -> title }}
	</div>

	<div class="p-2">
		{!! $activeNews -> text !!}
	</div>

	<div class="p-2">
		<img src="{{ asset('/images/modules/news/'.$activeNews -> id.'.jpg') }}" alt="{{ $activeNews -> title }}">
	</div>
@endsection