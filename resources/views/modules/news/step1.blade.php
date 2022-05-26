@extends('master')

@section('pageMetaTitle'){{ $activeNewsStep0 -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $activeNewsStep0 -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $activeNewsStep0 -> metaUrl }}@endsection

@section('content')
	<div class="container p-2 main_content--height">
		<div class="p-2 tags">
			<a href="{{ $page -> fullUrl }}">
				{{ $page -> title }}
			</a>

			<div class="px-2 d-inline-block">
				<span class="ba_arrow_right tags__arrow"></span>
			</div>

			{{ $activeNewsStep0 -> title }}
		</div>

		<h1 class="p-2">
			{{ $activeNewsStep0 -> title }}
		</h1>

		<div class="float-right img_wrapper">
			<div class="p-2">
				<img src="{{ asset('/storage/images/modules/news/28/'.$activeNewsStep0 -> id.'.jpg') }}" alt="{{ $activeNewsStep0 -> title }}">
			</div>
		</div>

		<div class="p-2">
			{!! $activeNewsStep0 -> text !!}
		</div>
		
		<div class="clear_both"></div>

		<div class="row mt-4">
			@foreach($activeNewsStep0 -> newsStep1 as $data)
				<div class="col-xxl-4 col-xl-6 col-md-6 col-12">
					<a href="{{ $data -> fullUrl }}">
						<div class="p-2">
							<img src="{{ asset('/storage/images/modules/news/29/'.$data -> id.'.jpg') }}" alt="{{ $data -> title }}">
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