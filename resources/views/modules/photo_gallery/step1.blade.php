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
			{{ $activePhotoGalleryStep0 -> title }}
		</div>

		<div>
			<h1 class="py-lg-5 py-3 px-2 text-center">
				{{ $activePhotoGalleryStep0 -> title }}
			</h1>
		</div>

		<div class="row pb-lg-5 pb-3">
			<div class="col-lg-6 col-12">
				<div class="p-2">
					<h3>
						{{ $activePhotoGalleryStep0 -> title }}
					</h3>
				</div>

				<div class="p-2">
					{!! $activePhotoGalleryStep0 -> text !!}
				</div>
			</div>

			<div class="col-lg-6 col-12">
				<div class="p-2">
					<img src="{{ asset('/storage/images/modules/photo_gallery/step_0/'.$activePhotoGalleryStep0 -> id.'.jpg') }}" alt="{{ $activePhotoGalleryStep0 -> title }}">
				</div>
			</div>
		</div>


		<div class="row">
			@foreach($photoGalleryStep1 as $data)
				<div class="col-3">
					<div class="p-2">
						<div class="p-2">
							<img src="{{ asset('/storage/images/modules/photo_gallery/step_1/'.$data -> id.'.jpg') }}" alt="{{ $data -> title }}">
						</div>

						<div class="p-2">
							{{ $data -> title }}
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection