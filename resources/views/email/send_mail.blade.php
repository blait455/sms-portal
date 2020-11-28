@component('mail::message')
    # {{ $data['subject'] }}

    The body of your message.

    {{ $data['body'] }}

    Thanks,
    {{ config('app.name') }}
@endcomponent
