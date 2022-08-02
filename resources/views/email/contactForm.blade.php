@component('mail::message')
    # კონტაქტი

    სახელი,გვარი: {{ $name }} {{ $lastName }} 
    ელ.ფოსტა {{ $email }} 
    ტელეფონი: {{ $phone }} 
    მისამართ: {{ $address }} 
    კომენტარი: {{ $comment }} 

    {{ config('app.name') }}
@endcomponent