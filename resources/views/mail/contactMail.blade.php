@component("mail::message")


Sender Name: {{ $details['name'] }}

Sender Email: {{ $details['email'] }}


{{ $details['message'] }}



@component('mail::subcopy')
About Drinks
@endcomponent

@endcomponent