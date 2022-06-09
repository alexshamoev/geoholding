@extends('admin.master')


@section('pageMetaTitle')
	{{ $module -> title }}
@endsection


@section('content')
    @include('admin.includes.tags', [
		'tag0Text' => $module -> title
	])


    @foreach($orders as $data) 
        <div class="p-2">
            <div class="p-2">
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
            </div>
        </div>
    @endforeach

	{{-- <div class="p-2">
        <div class="p-2">
            <div class="standard-block p-2">
                <div class="p-2">
                    ელ. ფოსტის მისამართი: *
                </div>
                <p>სახელი: {{ $emailData['user'] -> name}}</p>
                <p>გვარი: {{ $emailData['user'] -> last_name}}</p>
                <p>ელ.ფოსტა: {{ $emailData['user'] -> email}}</p>
                <p>ტელეფონი: {{ $emailData['user'] -> phone}}</p>
                <p>მისამართი: {{ $emailData['user'] -> address}}</p>
                <p>შეკვეთის თარიღი: {{ $emailData['order'] -> created_at}}</p>
                <p>სრული თანხა: {{ $emailData['order'] -> full_price}} ₾</p>

                @foreach($emailData['products'] as $key => $data)
                <div class="p-2">
                    <span>პროდუქტი: {{ $data -> { 'title_'.$emailData['language'] } }}</span> <br>
                    <span>ფასი: {{ $data -> price }} ₾</span> <br>
                    <span>რაოდენობა: {{ $emailData['quantity'][$key] }} ცალი</span> <br>
                </div>
                @endforeach

            </div>
        </div>
	</div> --}}
@endsection