@extends('master')

@section('pageMetaTitle'){{ $activeNewsStep3 -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $activeNewsStep3 -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $activeNewsStep3 -> metaUrl }}@endsection

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
				<a href="{{ $activeNewsStep3 -> parentModel -> parentModel -> parentModel -> fullUrl }}">
					{{ $activeNewsStep3 -> parentModel -> parentModel -> parentModel -> title }}
				</a>
			</div>

			<div class="p-2">
				<span class="ba_arrow_right tag_next"></span>
			</div>

			<div class="p-2">
				<a href="{{ $activeNewsStep3 -> parentModel -> parentModel -> fullUrl }}">
					{{ $activeNewsStep3 -> parentModel -> parentModel -> title }}
				</a>
			</div>

			<div class="p-2">
				<span class="ba_arrow_right tag_next"></span>
			</div>

			<div class="p-2">
				<a href="{{ $activeNewsStep3 -> parentModel -> fullUrl }}">
					{{ $activeNewsStep3 -> parentModel -> title }}
				</a>
			</div>

			<div class="p-2">
				<span class="ba_arrow_right tag_next"></span>
			</div>

			<div class="p-2">
				{{ $activeNewsStep3 -> title }}
			</div>
		</div>
		
		
		<h1 class="p-2">
			{{ $activeNewsStep3 -> title }}
		</h1>

		<div class="float-right img_wrapper">
			<div class="p-2">
				<img src="{{ asset('/storage/images/modules/news/step_3/'.$activeNewsStep3 -> id.'.jpg') }}" alt="{{ $activeNewsStep3 -> title }}">
			</div>
		</div>

		<div class="p-2">
			{!! $activeNewsStep3 -> text !!}
		</div>

		<div class="clear_both"></div>
	</div>
@endsection