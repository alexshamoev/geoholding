@component('mail::message')
    <h2>კონტაქტი</h2>
    
    სახელი: {{ $form['fullname'] }}
    კომპანიის სახელი {{ $form['company_name'] }}
    ელ-ფოსტა: {{ $form['email_address'] }}
    ტელეფონი: {{ $form['phone_number'] }}
    შეტყობინება: {!! $form['message'] !!}

    {{ config('app.name') }}
@endcomponent