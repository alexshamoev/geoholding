@extends('master')


@section('pageMetaTitle')
    Photo Gallery Step 0
@endsection


@section('content')
<section>
	<div class="container main_content--height">
		<div class="p-2 d-flex align-items-center">
			<a href="{{ '/'.$language -> title.'/'.$page -> alias }}">
				{{ $page -> title }}
			</a>

			<span class="ba_arrow_right px-2 tag_next"></span>
			
			{{ $activePhotoGalleryStep0 -> title }}
		</div>
 
		<div>
			<h1 class="py-lg-5 py-3 px-2 text-center">
				{{ $activePhotoGalleryStep0 -> title }}
			</h1>
		</div>

		<div class="p-2">
			<h3>
				{{ $activePhotoGalleryStep0 -> title }}
			</h3>
		</div>

		<div class="float-right img_wrapper">
			<div class="p-2">
				<img src="{{ asset('/storage/images/modules/photo_gallery/step_0/'.$activePhotoGalleryStep0 -> id.'.jpg') }}" alt="{{ $activePhotoGalleryStep0 -> title }}">
			</div>
		</div>
		
		<div class="clearfix"></div>

		<div class="p-2">
			{!! $activePhotoGalleryStep0 -> text !!}
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
</section>
@endsection