@extends('master')


@section('pageMetaTitle')
    Photo Gallery Step 0
@endsection


@section('content')
	<div class="p-2">
		<a href="{{ '/'.$language -> title.'/'.$page -> alias }}">
        	{{ $page -> title }}
		</a>
		>
        {{ $activePhotoGalleryCategory -> title }}
    </div>


    <h1 class="p-2">
        {{ $activePhotoGalleryCategory -> alias }}
    </h1>

	<div class="p-2">
		{{ $activePhotoGalleryCategory -> title }}
	</div>

	<div class="p-2">
		<img src="{{ asset('/images/modules/photo_gallery/'.$activePhotoGalleryCategory -> id.'.jpg') }}" alt="{{ $activePhotoGalleryCategory -> title }}">
	</div>

	<div class="p-2">
		{{ $activePhotoGalleryCategory -> text }}
	</div>
@endsection