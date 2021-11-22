@extends('master')


@section('pageMetaTitle')
    News Step 1
@endsection


@section('content')
	<section class="news_step1__section">
		<div class="container">
			<div class="p-2">
				<a href="{{ '/'.$language -> title.'/'.$page -> alias }}">
					{{ $page -> title }}
				</a>
				{{ $activeNewsStep0 -> title }}
			</div>
			
			
			<h1 class="p-2">
				{{ $activeNewsStep0 -> title }}
			</h1>

			<div class="float-right img_wrapper">
				<div class="p-2">
					<img src="{{ asset('/storage/images/modules/news/step_0/'.$activeNewsStep0 -> id.'.jpg') }}" alt="{{ $activeNewsStep0 -> title }}">
				</div>
			</div>

			<div class="p-2">
				{!! $activeNewsStep0 -> text !!}
			</div>

			<div class="clearfix"></div>


			<div class="row">
				@foreach($newsStep1 as $data)
					<div class="col-3">
						<a href="{{ $data -> fullUrl }}">
							<div class="p-2">
								<div class="p-2">
									<img src="{{ asset('/storage/images/modules/news/step_1/'.$data -> id.'.jpg') }}" alt="{{ $data -> title }}">
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