@extends('master')


@section('pageMetaTitle')
    Home
@endsection


@section('content')
	<div class="container p-2 main_content--height">
		<div class="p-2">
			<h1>
				{{ __('bsw.static_page') }} - 

				{{ $page -> title }}
			</h1>
		</div>

		<div class="p-2">
			{!! $page -> text !!} 
		</div>

		{{--
		<div class="p-2">
			BSC Sample: {{ $bsc -> a_folders_url }}
		</div>

		<div class="p-2">
			BSW Sample: {{ $bsw -> a_add_image }}
		</div>
		--}}
	</div>
@endsection


@section('menu')
    <div class="p-2">
        Menu on Home
    </div>


    @parent
@endsection