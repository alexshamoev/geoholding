@extends('master')

@section('pageMetaTitle'){{ $activeNewsStep2 -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $activeNewsStep2 -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $activeNewsStep2 -> metaUrl }}@endsection

@section('content')
	<div class="container p-2 main_content--height">
		<div class="p-2 tags">
			<a href="{{ $page -> fullUrl }}">
				{{ $page -> title }}
			</a>

			<div class="px-2 d-inline-block">
				<span class="ba_arrow_right tags__arrow"></span>
			</div>

			<a href="{{ $activeNewsStep2 -> newsStep1 -> newsStep0 -> fullUrl }}">
				{{ $activeNewsStep2 -> newsStep1 -> newsStep0 -> title }}
			</a>

			<div class="px-2 d-inline-block">
				<span class="ba_arrow_right tags__arrow"></span>
			</div>

			<a href="{{ $activeNewsStep2 -> newsStep1 -> fullUrl }}">
				{{ $activeNewsStep2 -> newsStep1 -> title }}
			</a>

			<div class="px-2 d-inline-block">
				<span class="ba_arrow_right tags__arrow"></span>
			</div>

			{{ $activeNewsStep2 -> title }}
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
			@foreach($activeNewsStep2 -> newsStep3 as $data)
				<div class="col-3">
					<a href="{{ $data -> fullUrl }}">
						<div class="p-2">
							<div class="p-2">
								<img src="{{ asset('/storage/images/modules/news/step_3/'.$data -> id.'.jpg') }}" alt="{{ $data -> title }}">
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
						</div>
					</a>
				</div>
			@endforeach
		</div>
	</div>
@endsection