@extends('master')


@section('pageMetaTitle')
	{{ $page -> title }}
@endsection


@section('content')
	<div class="container p-2 photo_gallery main_content--height">
		<div>	
			<h1 class="p-2 text-center">
				{{ $page -> title }}
			</h1>
		</div>

		<div class="p-2">
			{!! $page -> text !!}
		</div>

		<div class="row">
			@foreach($photoGalleryStep0 as $data)
				<div class="col-xl-4 col-md-6 col-12 p-2">
					<a href="{{ $data -> fullUrl }}">
						<div class="photo_gallery__block">
							<img src="{{ asset('/storage/images/modules/photo_gallery/step_0/'.$data -> id.'.jpg') }}" alt="{{ $data -> title }}">

							<div class="p-2">
								<div class="p-2">
									<h3 class="line_2">
										{{ $data -> title }}
									</h3>
								</div>

								<div class="p-2">
									<div class="line_4">
										{!! $data -> text !!}
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			@endforeach
		</div>

	</div>
@endsection