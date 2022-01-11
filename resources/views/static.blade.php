@extends('master')


@section('pageMetaTitle')
	{{ $page -> metaTitle }}
@endsection

@section('pageMetaDescription')
	{{ $page -> metaDescription }}
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
	</div>
@endsection


@section('menu')
    <div class="p-2">
        Menu on Home
    </div>


    @parent
@endsection