@component('mail::message')
# Introduction

You have successfully subscribed to our mailing list

@component('mail::button', ['url' => ''])
Home page
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent
