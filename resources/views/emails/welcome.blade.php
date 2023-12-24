@component('mail::message')
# Welcome for Registration on {{ config('app.name') }}

After login you will get much better experience

@component('mail::button', ['url' => '/user/login'])
LOGIN
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
