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

		{{ Form :: open(array('route' => 'contactUpdate', 'method' => 'post')) }}
            სახელი: {{ Form :: text('name') }} <br>
            გვარი: {{ Form :: text('lastName') }} <br>
            ელ.ფოსტა: {{ Form :: email('email') }} <br>
            ტელეფონი: {{ Form :: text('phone') }} <br>
            მისამართი: {{ Form :: text('address') }} <br>
            კომენტარი: {{ Form :: textarea('comment') }} <br>

			{{ Form :: submit('Click Me!') }}
	    {{ Form :: close() }}

	</div>
@endsection