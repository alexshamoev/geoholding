@extends('master')

@section('pageMetaTitle'){{ $activeNewsStep1 -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $activeNewsStep1 -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $activeNewsStep1 -> metaUrl }}@endsection

@section('content')
	<div class="container p-2 main_content--height">
		<div class="p-2 tags">
			<a href="{{ $page -> fullUrl }}">
				{{ $page -> title }}
			</a>

			<div class="px-2 d-inline-block">
				<span class="ba_arrow_right tags__arrow"></span>
			</div>

			<a href="{{ $activeNewsStep1 -> newsStep0 -> fullUrl }}">
				{{ $activeNewsStep1 -> newsStep0 -> title }}
			</a>

			<div class="px-2 d-inline-block">
				<span class="ba_arrow_right tags__arrow"></span>
			</div>

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

		<div class="clear_both"></div>
		

		<div class="row mt-4">
			@foreach($activeNewsStep1 -> newsStep2 as $data)
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