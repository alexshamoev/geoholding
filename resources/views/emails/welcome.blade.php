@component('mail::message')
    <a href="{{ route('adminLogin') }}"> საადმინისტრაციო პანელის ბმული </a> <br>

    მომხმარებლის ელ. ფოსტა:
    {{ $email }}

    მომხმარებლის პაროლი:
    {{ $password }}

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
