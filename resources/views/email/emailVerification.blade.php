@component('mail::message')
# {{ __('email.verify_email') }}

<p>{{ __('email.verify_email_text_0') }}</p>

@component('mail::button', ['url' => url('/').'/'.$data['language'].'/verify/'.$data['id'], 'color' => 'blue'])
{{ __('email.verify_email_button') }}
@endcomponent

<span>{{ __('email.verify_email_text_1') }}</span>

{{ __('email.thanks') }},<br>
{{ config('app.name') }}
@endcomponent
