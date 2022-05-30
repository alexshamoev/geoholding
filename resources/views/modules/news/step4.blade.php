@extends('master')

@section('pageMetaTitle'){{ $activeNewsStep3 -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $activeNewsStep3 -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $activeNewsStep3 -> metaUrl }}@endsection

@section('content')
	<div class="container p-2 main_content--height">
		<div class="p-2 tags">
			<a href="{{ $page -> fullUrl }}">
				{{ $page -> title }}
			</a>

			<div class="px-2 d-inline-block">
				<span class="ba_arrow_right tags__arrow"></span>
			</div>

			<a href="{{ $activeNewsStep3 -> newsStep2 -> newsStep1 -> newsStep0 -> fullUrl }}">
				{{ $activeNewsStep3 -> newsStep2 -> newsStep1 -> newsStep0 -> title }}
			</a>

			<div class="px-2 d-inline-block">
				<span class="ba_arrow_right tags__arrow"></span>
			</div>

			<a href="{{ $activeNewsStep3 -> newsStep2 -> newsStep1 -> fullUrl }}">
				{{ $activeNewsStep3 -> newsStep2 -> newsStep1 -> title }}
			</a>

			<div class="px-2 d-inline-block">
				<span class="ba_arrow_right tags__arrow"></span>
			</div>

			<a href="{{ $activeNewsStep3 -> newsStep2 -> fullUrl }}">
				{{ $activeNewsStep3 -> newsStep2 -> title }}
			</a>

			<div class="px-2 d-inline-block">
				<span class="ba_arrow_right tags__arrow"></span>
			</div>

			{{ $activeNewsStep3 -> title }}
		</div>
		
		
		<h1 class="p-2">
			{{ $activeNewsStep3 -> title }}
		</h1>

		<div class="float-right img_wrapper">
			<div class="p-2">
				<img src="{{ asset('/storage/images/modules/news/33/'.$activeNewsStep3 -> id.'.jpg') }}" alt="{{ $activeNewsStep3 -> title }}">
			</div>
		</div>

		<div class="p-2">
			{!! $activeNewsStep3 -> text !!}
		</div>

		<div class="clear_both"></div>
	</div>
@endsection