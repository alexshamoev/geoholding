@extends('master')


@section('pageMetaTitle')
	{{ $page -> title }}
@endsection


@section('content')
	<div class="container photo_gallery">
		<div>	
			<h1 class="py-lg-5 py-3 px-2 text-center">
				{{ $page -> title }}
			</h1>
		</div>

		<div class="p-2">
			{!! $page -> text !!}
		</div>

		<div class="row">
			@foreach($photoGalleryStep0 as $data)
				<div class="col-lg-4 col-md-6 col-12 px-sm-3 px-2 py-3">
					<a href="{{ $data -> fullUrl }}">
						<div class="photo_gallery__block">						
							<img src="{{ asset('/storage/images/modules/photo_gallery/step_0/'.$data -> id.'.jpg') }}" alt="{{ $data -> title }}">

							<div class="px-3 pb-2 pt-4">
								<h3 class="line_2">
									{{ $data -> title }}
								</h3>
							</div>

							<div class="px-3 pb-4">
								<div class="line_4">
									{!! $data -> text !!}
								</div>
							</div>
						</div>
					</a>
				</div>
			@endforeach
		</div>

	</div>
@endsection