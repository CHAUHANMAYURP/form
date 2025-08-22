@component('mail::message')
# Verify your email

Your verification code is:

# **{{ $code }}**

This code expires in 15 minutes.

If you didn’t create an account, please ignore this email.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
