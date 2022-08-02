@component('mail::message')
    <h1 style="font-weight:normal">{{ __('email.hello').' '.$data['name'] }}</h1> 

    <b>{{ __('email.password_rec_text') }}</b>

    @component('mail::button', ['url' => url('/').'/'.$data['language'].'/reset/'.$data['email'], 'color' => 'blue'])
        {{ __('email.reset_password') }}
    @endcomponent

    <p>{{ __('email.pass_rec_contact') }}.</p>

    {{ __('email.thanks') }},<br>
    {{ config('app.name') }}
@endcomponent