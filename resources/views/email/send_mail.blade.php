@component('mail::message')
    # {{ $data['subject'] }}

    The body of your message.

    {{ $data['body'] }}

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
