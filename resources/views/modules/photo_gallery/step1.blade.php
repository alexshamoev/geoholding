@extends('master')

@section('pageMetaTitle'){{ $activePhotoGalleryStep0 -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $activePhotoGalleryStep0 -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $activePhotoGalleryStep0 -> metaUrl }}@endsection

@section('content')
	<div class="container
				p-2
				main_content--height
				photo_gallery_step_1">
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

		<div class="row my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
			@foreach($photoGalleryStep1 as $data)
				<figure itemprop="associatedMedia" class="col-3">
					<a href="{{ asset('/storage/images/modules/photo_gallery/step_1/'.$data -> id.'.jpg') }}"
						itemprop="contentUrl"
						data-size="2000x1200">
						<img src="{{ asset('/storage/images/modules/photo_gallery/step_1/'.$data -> id.'_preview.jpg') }}"
							 itemprop="thumbnail"
							 alt="Image description" />
					</a>

					<figcaption class="d-none" itemprop="caption description">{{ $data -> title }}</figcaption>
				</figure>
			@endforeach
		</div>
	</div>
@endsection