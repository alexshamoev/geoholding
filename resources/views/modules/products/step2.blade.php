@extends('master')

@section('pageMetaTitle'){{ $activeProductStep1 -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $activeProductStep1 -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $activeProductStep1 -> metaUrl }}@endsection

@section('content')
	<div class="container p-2 main_content--height">
		<div class="p-2 tags">
			<a href="{{ $page -> fullUrl }}">
				{{ $page -> title }}
			</a>

			<div class="px-2 d-inline-block">
				<span class="ba_arrow_right tags__arrow"></span>
			</div>

			<a href="{{ $activeProductStep1 -> productStep0 -> fullUrl }}">
				{{ $activeProductStep1 -> productStep0 -> title }}
			</a>

			<div class="px-2 d-inline-block">
				<span class="ba_arrow_right tags__arrow"></span>
			</div>

			{{ $activeProductStep1 -> title }}
		</div>
		
		
		<h1 class="p-2">
			{{ $activeProductStep1 -> title }}
		</h1>

		<div class="float-right img_wrapper">
			<div class="p-2">
				<img src="{{ asset('/storage/images/modules/products/68/'.$activeProductStep1 -> id.'.jpg') }}" alt="{{ $activeProductStep1 -> title }}">
			</div>
		</div>

		<div class="p-2">
			{!! $activeProductStep1 -> text !!}
		</div>

		<div class="clear_both"></div>
		

		<div class="row mt-4">
			@foreach($activeProductStep1 -> productStep2 as $data)
				<div class="col-xxl-4 col-xl-6 col-md-6 col-12">
					<a href="{{ $data -> fullUrl }}">
						<div class="p-2">
							<img src="{{ asset('/storage/images/modules/products/69/'.$data -> id.'.jpg') }}" alt="{{ $data -> title }}">
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