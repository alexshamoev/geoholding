@extends('master')


@section('pageMetaTitle')
    Photo Gallery Step 0
@endsection


@section('content')
	<div class="container p-2 main_content--height">
		<div class="d-flex align-items-center">
			<div class="p-2">
				<a href="{{ '/'.$language -> title.'/'.$page -> alias }}">
					{{ $page -> title }}
				</a>
			</div>

			<div class="p-2">
				<span class="ba_arrow_right tag_next"></span>
			</div>
			
			<div class="p-2">
				{{ $activePhotoGalleryStep0 -> title }}
			</div>
		</div>

		<h1 class="p-2">
			{{ $activePhotoGalleryStep0 -> title }}
		</h1>

		<div class="mb-3">
			<div class="float-right img_wrapper">
				<div class="p-2">
					<img src="{{ asset('/storage/images/modules/photo_gallery/step_0/'.$activePhotoGalleryStep0 -> id.'.jpg') }}" alt="{{ $activePhotoGalleryStep0 -> title }}">
				</div>
			</div>
	
			<div class="p-2">
				{!! $activePhotoGalleryStep0 -> text !!}
			</div>
	
			<div class="clear_both"></div>
		</div>
		

		<div class="row">
			@foreach($photoGalleryStep1 as $data)
				<div class="col-3">
					<div class="p-2">
						<img src="{{ asset('/storage/images/modules/photo_gallery/step_1/'.$data -> id.'.jpg') }}" alt="{{ $data -> title }}">
					</div>
					
					<div class="p-2">
						{{ $data -> title }}
					</div>
				</div>
			@endforeach
		</div>
	</div>


	<button id="btn">Open PhotoSwipe</button>
</section>
@endsection