

@component('mail::message')

Hi,{{ $user->name }}.Forgot Your password?

<p>Click the button below to reset your password</p>

You are receiving this email because we received a password reset request for your account.

{{-- @component('mail::button', ['url' => route('password.reset', $token)]) --}}
   @component('mail::button', ['url' => url('password.reset', $user->remember_token)])

   Reset Your Password

   @endcomponent

If you did not request a password reset, no further action is required.


{{ config('app.name') }}
@endcomponent