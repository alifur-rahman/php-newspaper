@component('mail::message')
{{ $mtitle }}
# OTP Code is {{ $code }}

{{ $mShortMsg }}

@component('mail::button', ['url' => '/user/login'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
