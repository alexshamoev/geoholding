@extends('master')

@section('pageMetaTitle'){{ $page -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $page -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $page -> metaUrl }}@endsection

@section('content')
	<div class="container p-2 main_content--height">
		<h1 class="p-2">
			{{ $page -> title }}
		</h1>

		<div class="p-2">
			{!! $page -> text !!}
		</div>

		{{ Form :: open(array('action' => 'ContactsController@update')) }}
            სახელი: {{ Form :: text('name') }}
            გვარი: {{ Form :: text('lastName') }}
	    {{ Form :: close() }}

	</div>
@endsection