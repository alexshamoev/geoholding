@component('mail::message')
# Order #{{ $emailData['order'] -> order_code}}

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

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
