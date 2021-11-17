@extends('master')


@section('pageMetaTitle')
    Photo Gallery Step 0
@endsection


@section('content')
	<div class="container">
		<div class="p-2">
			<a href="{{ '/'.$language -> title.'/'.$page -> alias }}">
				{{ $page -> title }}
			</a>
			>
			{{ $activePhotoGalleryCategory -> title }}
		</div>

		<div>
			<h1 class="py-lg-5 py-3 px-2 text-center">
				{{ $activePhotoGalleryCategory -> title }}
			</h1>
		</div>

		<div class="row pb-lg-5 pb-3">
			<div class="col-lg-6 col-12">
				<div class="p-2">
					<h3>
						{{ $activePhotoGalleryCategory -> title }}
					</h3>
				</div>

				<div class="p-2">
					{!! $activePhotoGalleryCategory -> text !!}
				</div>
			</div>

			<div class="col-lg-6 col-12">
				<div class="p-2">
					<img src="{{ asset('/storage/images/modules/photo_gallery/step_0/'.$activePhotoGalleryCategory -> id.'.jpg') }}" alt="{{ $activePhotoGalleryCategory -> title }}">
					<!-- <img src="{{ asset('images/test_images/test.jpg') }}"> -->
				</div>
			</div>
		</div>
	</div>
@endsection