@extends('master')


@section('pageMetaTitle')
	{{ $activeNewsStep1 -> title }}
@endsection


@section('content')
	<section class="news_step1__section">
		<div class="container">
			<div class="p-2 d-flex align-items-center">
				<a href="{{ '/'.$language -> title.'/'.$page -> alias }}">
					{{ $page -> title }}
				</a>

				<span class="ba_arrow_right px-2 tag_next"></span>

				<a href="{{ $activeNewsStep0 -> fullUrl }}">
					{{ $activeNewsStep0 -> title }}
				</a>

				<span class="ba_arrow_right px-2 tag_next"></span>

				{{ $activeNewsStep1 -> title }}
			</div>
			
			
			<h1 class="p-2">
				{{ $activeNewsStep1 -> title }}
			</h1>

			<div class="float-right img_wrapper">
				<div class="p-2">
					<img src="{{ asset('/storage/images/modules/news/step_1/'.$activeNewsStep1 -> id.'.jpg') }}" alt="{{ $activeNewsStep1 -> title }}">
				</div>
			</div>

			<div class="p-2">
				{!! $activeNewsStep1 -> text !!}
			</div>

			<div class="clearfix"></div>
			

			<div class="row">
				@foreach($newsStep2 as $data)
					<div class="col-3">
						<a href="{{ $data -> fullUrl }}">
							<div class="p-2">
								<div class="p-2">
									<img src="{{ asset('/storage/images/modules/news/step_2/'.$data -> id.'.jpg') }}" alt="{{ $data -> title }}">
								</div>
								
								<div class="p-2">
									{{ $data -> title }}
								</div>

								<div class="p-2">
									{!! $data -> text !!}
								</div>
							</div>
						</a>
					</div>
				@endforeach
			</div>
		</div>
	</section>
@endsection