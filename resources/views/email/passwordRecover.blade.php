@component('mail::message')
<h1 style="font-weight:normal">{{ __('auth.hello').' '.$data['name'] }}</h1> 

<b>{{ __('auth.password_rec_text') }}</b>

@component('mail::button', ['url' => url('/').'/'.$data['language'].'/reset/'.$data['email'], 'color' => 'blue'])
    {{ __('auth.reset_password') }}
@endcomponent

<p>{{ __('auth.pass_rec_contact') }}.</p>

{{ __('auth.thanks') }},<br>
{{ config('app.name') }}
@endcomponent
