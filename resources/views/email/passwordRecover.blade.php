@component('mail::message')
<h1 style="font-weight:normal">Hello {{ $data['name'] }}</h1> 

<b>A Request has been received to change the password for you {{ config('app.name') }} account.</b>

@component('mail::button', ['url' => url('/').'/'.$data['language'].'/reset/'.$data['email'], 'color' => 'blue'])
    Reset Password
@endcomponent

<p>If you did not initiate this request, please contact us immediately.</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
