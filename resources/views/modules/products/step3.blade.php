@extends('master')

@section('pageMetaTitle'){{ $activeProductStep2 -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $activeProductStep2 -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $activeProductStep2 -> metaUrl }}@endsection

@section('content')
	<div class="container p-2 main_content--height">
		<div class="p-2 tags">
			<a href="{{ $page -> fullUrl }}">
				{{ $page -> title }}
			</a>

			<div class="px-2 d-inline-block">
				<span class="ba_arrow_right tags__arrow"></span>
			</div>

			<a href="{{ $activeProductStep2 -> productStep1 -> productStep0 -> fullUrl }}">
				{{ $activeProductStep2 -> productStep1 -> productStep0 -> title }}
			</a>

			<div class="px-2 d-inline-block">
				<span class="ba_arrow_right tags__arrow"></span>
			</div>

			<a href="{{ $activeProductStep2 -> productStep1 -> fullUrl }}">
				{{ $activeProductStep2 -> productStep1 -> title }}
			</a>

			<div class="px-2 d-inline-block">
				<span class="ba_arrow_right tags__arrow"></span>
			</div>

			{{ $activeProductStep2 -> title }}
		</div>
		
		
		<h1 class="p-2">
			{{ $activeProductStep2 -> title }}
		</h1>

		<div class="float-right img_wrapper">
			<div class="p-2">
				<img src="{{ asset('/storage/images/modules/products/69/'.$activeProductStep2 -> id.'.jpg') }}" alt="{{ $activeProductStep2 -> title }}">
			</div>
		</div>

		<div class="p-2">
			{!! $activeProductStep2 -> text !!}
		</div>

		<div class="clear_both"></div>
		

        <div class="row">
            <div class="p-2">
                პარამეტრები: 
            </div>

			@foreach($activeProductStep2 -> productStep4 as $data)
                <div class="d-flex justify-content-start">
                    <div class="col-2 d-flex justify-content-between align-items-center">
                            <img src="{{ asset('/storage/images/modules/products/71/'.$data -> id.'.svg') }}" alt="{{ $data -> title }}" style="width:30px; ">
                        
                            {{ $data -> title }}
                    </div>
                </div>
			@endforeach
		</div>

		<div class="row my-gallery col-lg-6 col-12 p-0" itemscope itemtype="http://schema.org/ImageGallery">
			@foreach($activeProductStep2 -> productStep3 as $data)
				<figure itemprop="associatedMedia" class="col-4">

					<a href="{{ asset('/storage/images/modules/products/70/'.$data -> id.'.jpg') }}"
						itemprop="contentUrl"
						data-size="2000x1200">
						<img src="{{ asset('/storage/images/modules/products/70/'.$data -> id.'_preview.jpg') }}"
							itemprop="thumbnail"
							alt="Image description" />
					</a>

					<figcaption class="d-none" itemprop="caption description">{{ $data -> title }}</figcaption>
				</figure>
			@endforeach
		</div>
	</div>
@endsection