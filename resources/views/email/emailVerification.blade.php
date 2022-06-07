@component('mail::message')
# Verify your email address

<p>In order to start using your account, you need to confirm your email address.</p>

@component('mail::button', ['url' => url('/').'/'.$data['language'].'/verify/'.$data['id'], 'color' => 'blue'])
    Verify Email Address
@endcomponent

<span>if you did not sign up for this account you can ignore this email.</span>

{{ __('auth.thanks') }},<br>
{{ config('app.name') }}
@endcomponent
