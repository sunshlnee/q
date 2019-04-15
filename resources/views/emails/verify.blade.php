@component('mail::message')
# Подтверждение пароля

Пожалуйста, перйдите по этой ссылке:

@component('mail::button', ['url' => route('register.verify', ['token' => $user->verify_token])])
Verify Email
@endcomponent

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
