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

		<div class="row">
			@foreach($orders as $data)
				<div class="standard-block p-2">
                    <div class="p-2">
                        სახელი: {{ $data -> user -> name}}
                    </div>
                    <div class="p-2">
                        გვარი: {{ $data -> user -> last_name}}
                    </div>
                    <div class="p-2">
                        ელ.ფოსტა: {{ $data -> user -> email}}
                    </div>
                    <div class="p-2">
                        ტელეფონი: {{ $data -> user -> phone}}
                    </div>
                    <div class="p-2">
                        მისამართი: {{ $data -> user -> address}}
                    </div>
                    <div class="p-2">
                        შეკვეთის თარიღი: {{ $data -> created_at}}
                    </div>
                    <div class="p-2">
                        სრული თანხა: {{ $data -> full_price}} ₾
                    </div>

                    @foreach($data -> orderProducts as $dataInside)
                        <div class="p-2">
                            <span>პროდუქტი: {{ $dataInside -> products -> title }}</span> <br>
                            <span>ფასი: {{ $dataInside -> products -> price }} ₾</span> <br>
                            <span>რაოდენობა: {{ $dataInside -> quantity }} ცალი</span> <br>
                        </div>
                    @endforeach

                </div>
			@endforeach
		</div>
	</div>
@endsection