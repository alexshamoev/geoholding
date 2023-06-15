@extends('master')

@section('pageMetaTitle'){{ $page -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $page -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $page -> metaUrl }}@endsection

@section('content')
	<div class="container p-2 main_content--height">
		<!-- Vue -->
			<div id="app">
				<example title="Vue - {{ $page -> title }}"></example>
			</div>
		<!--  -->

		{{-- <!-- React -->
			<div id="examplereact" temp="eeee"></div>
		<!--  --> --}}

		@if(Session :: has('orderSuccessStatus'))
			<!-- Order status. -->
				<div class="p-2">
					<div class="alert alert-success m-0" role="alert">
						{{ Session :: get('orderSuccessStatus') }}
					</div>
				</div>
			<!--  -->
		@endif

		<div class="">
			@foreach ($companies as $item)
				<h1>{{ $item->title }}</h1>
			@endforeach
		</div>

		<h1 class="p-2">
			{{ $page -> title }}
		</h1>

		<div class="p-2">
			{!! $page -> text !!}
		</div>
	</div>
@endsection