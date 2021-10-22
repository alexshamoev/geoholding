@extends('master')


@section('pageMetaTitle')
	{{ $page -> title }}
	
@endsection


@section('content')
	<div class="container photo_gallery">
		<div>	
			<h1 class="p-2 text-center">
				{{ $page -> title }}
			</h1>
		</div>

		<div class="p-2">
			{!! $page -> text !!}
			Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum aliquid obcaecati quasi praesentium quibusdam qui blanditiis, delectus aliquam aut harum sed dolor ratione eius ipsum minima beatae et corrupti labore.
			Voluptatibus repellendus labore sunt suscipit eum consectetur ipsam tempore officiis, rerum quasi, quidem nihil. Dolores, quaerat voluptas odit sed ipsa atque, dicta placeat voluptate laboriosam blanditiis eum a fugit tempora.
			Et corrupti praesentium assumenda exercitationem eveniet ab asperiores. Cupiditate ex, voluptatem excepturi neque iure possimus culpa dolore, tempore doloribus quaerat eum perspiciatis porro aspernatur omnis obcaecati consequuntur. Autem, tempore esseferendis iure voluptatibus nihil debitis ipsum iusto. Harum neque vel suscipit sint nostrum numquam est eligendi beatae eaque.
		</div>

		<div class="row">
			@foreach($photoGalleryStep0 as $data)
				<div class="col-lg-4 col-md-6 col-12 px-sm-3 px-2 py-3">
					<a href="{{ $data -> fullUrl }}">
						<div class="photo_gallery__block">						
							<img src="{{ asset('images/modules/photo_gallery/'.$data -> id.'.jpg') }}" alt="{{ $data -> title }}">

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