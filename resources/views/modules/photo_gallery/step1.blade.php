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
		

		<div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">

<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
  <a href="https://farm3.staticflickr.com/2567/5697107145_a4c2eaa0cd_o.jpg" itemprop="contentUrl" data-size="1024x1024">
	  <img src="https://farm3.staticflickr.com/2567/5697107145_3c27ff3cd1_m.jpg" itemprop="thumbnail" alt="Image description" />
  </a>
									  <figcaption itemprop="caption description">Image caption  1</figcaption>
									  
</figure>

<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
  <a href="https://farm2.staticflickr.com/1043/5186867718_06b2e9e551_b.jpg" itemprop="contentUrl" data-size="964x1024">
	  <img src="https://farm2.staticflickr.com/1043/5186867718_06b2e9e551_m.jpg" itemprop="thumbnail" alt="Image description" />
  </a>
  <figcaption itemprop="caption description">Image caption 2</figcaption>
</figure>

<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
  <a href="https://farm7.staticflickr.com/6175/6176698785_7dee72237e_b.jpg" itemprop="contentUrl" data-size="1024x683">
	  <img src="https://farm7.staticflickr.com/6175/6176698785_7dee72237e_m.jpg" itemprop="thumbnail" alt="Image description" />
  </a>
  <figcaption itemprop="caption description">Image caption 3</figcaption>
</figure>

<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
  <a href="https://farm6.staticflickr.com/5023/5578283926_822e5e5791_b.jpg" itemprop="contentUrl" data-size="1024x768">
	  <img src="https://farm6.staticflickr.com/5023/5578283926_822e5e5791_m.jpg" itemprop="thumbnail" alt="Image description" />
  </a>
  <figcaption itemprop="caption description">Image caption 4</figcaption>
</figure>


</div>
	</div>
</section>
@endsection