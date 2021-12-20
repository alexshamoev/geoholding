@extends('master')


@section('pageMetaTitle')
	{{ $activeNewsStep1 -> title }}
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
				<a href="{{ $activeNewsStep0 -> fullUrl }}">
					{{ $activeNewsStep0 -> title }}
				</a>
			</div>

			<div class="p-2">
				<span class="ba_arrow_right tag_next"></span>
			</div>

			<div class="p-2">
				{{ $activeNewsStep1 -> title }}
			</div>
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

		<div class="clear_both"></div>
		

		<div class="row mt-4">
			@foreach($newsStep2 as $data)
				<div class="col-xxl-4 col-xl-6 col-md-6 col-12">
					<a href="{{ $data -> fullUrl }}">
						<div class="p-2">
							<img src="{{ asset('/storage/images/modules/news/step_2/'.$data -> id.'.jpg') }}" alt="{{ $data -> title }}">
						</div>

						<div class="p-2">
							<h3 class="line_2">
								{{ $data -> title }}
							</h3>
						</div>

						<div class="p-2">
							<div class="line_5">
								{!! $data -> text !!}
							</div>
						</div>
					</a>
				</div>
			@endforeach
		</div>
	</div>
@endsection