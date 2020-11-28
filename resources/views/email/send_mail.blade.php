@component('mail::message')
    # {{ $data['subject'] }}

    The body of your message.

    {{ $data['content'] }}

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
