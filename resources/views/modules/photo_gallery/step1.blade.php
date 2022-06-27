@extends('master')

@section('pageMetaTitle'){{ $activeCategory -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $activeCategory -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $activeCategory -> metaUrl }}@endsection

@section('content')
	<div class="container
				p-2
				main_content--height
				photo_gallery_step_1">
		<div class="p-2 tags">
			<a href="{{ $page -> fullUrl }}">
				{{ $page -> title }}
			</a>

			<div class="px-2 d-inline-block">
				<span class="ba_arrow_right tags__arrow"></span>
			</div>
			
			{{ $activeCategory -> title }}
		</div>

		<h1 class="p-2">
			{{ $activeCategory -> title }}
		</h1>

		<div class="mb-3">
			<div class="float-right img_wrapper">
				<div class="p-2">
					<img src="{{ asset('/storage/images/modules/photo_gallery/2/'.$activeCategory -> id.'.jpg') }}" alt="{{ $activeCategory -> title }}">
				</div>
			</div>
	
			<div class="p-2">
				{!! $activeCategory -> text !!}
			</div>
	
			<div class="clear_both"></div>
		</div>

		<div class="row my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
			@foreach($activeCategory -> photoGalleryStep1 as $data)
				<figure itemprop="associatedMedia" class="col-2">
					<a href="{{ asset('/storage/images/modules/photo_gallery/34/'.$data -> id.'.jpg') }}"
						itemprop="contentUrl"
						data-size="2000x1200">
						<img src="{{ asset('/storage/images/modules/photo_gallery/34/'.$data -> id.'_preview.jpg') }}"
							 itemprop="thumbnail"
							 alt="{{ $data -> title }}"/>
					</a>

					<figcaption class="d-none" itemprop="{{ $data -> title }}">{{ $data -> title }}</figcaption>
				</figure>
			@endforeach
		</div>
	</div>
@endsection