@extends('master')


@section('pageMetaTitle')
	{{ $activeNewsStep2 -> title }}
@endsection


@section('content')
	<section class="news_step1__section">
		<div class="container main_content--height">
			<div class="p-2 d-flex align-items-center">
				<a href="{{ '/'.$language -> title.'/'.$page -> alias }}">
					{{ $page -> title }}
				</a>

				<span class="ba_arrow_right px-2 tag_next"></span>

				<a href="{{ $activeNewsStep0 -> fullUrl }}">
					{{ $activeNewsStep0 -> title }}
				</a>

				<span class="ba_arrow_right px-2 tag_next"></span>

				<a href="{{ $activeNewsStep1 -> fullUrl }}">
					{{ $activeNewsStep1 -> title }}
				</a>

				<span class="ba_arrow_right px-2 tag_next"></span>

				{{ $activeNewsStep1 -> title }}
			</div>
			
			
			<h1 class="p-2">
				{{ $activeNewsStep2 -> title }}
			</h1>

			<div class="float-right img_wrapper">
				<div class="p-2">
					<img src="{{ asset('/storage/images/modules/news/step_2/'.$activeNewsStep2 -> id.'.jpg') }}" alt="{{ $activeNewsStep2 -> title }}">
				</div>
			</div>

			<div class="p-2">
				{!! $activeNewsStep2 -> text !!}
			</div>

			<div class="clear_both"></div>
			

			<div class="row">
				@foreach($newsStep3 as $data)
					<div class="col-3">
						<a href="{{ $data -> fullUrl }}">
							<div class="p-2">
								<div class="p-2">
									<img src="{{ asset('/storage/images/modules/news/step_3/'.$data -> id.'.jpg') }}" alt="{{ $data -> title }}">
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