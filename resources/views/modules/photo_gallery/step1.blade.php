@extends('master')


@section('pageMetaTitle')
    News Step 0
@endsection


@section('content')
    <h1 class="p-2">
        {{ $activePhotoGalleryCategory -> alias }}
    </h1>

	<div class="p-2">
		{{ $activePhotoGalleryCategory -> title }}
	</div>

	<div class="p-2">
		{!! $activePhotoGalleryCategory -> text !!}
	</div>
@endsection