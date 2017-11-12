@component('mail::message')
# Hi {{ $downloadLink->name }}

Download {{ $downloadLink->book->title }}

@component('mail::button', ['url' => url('download/' . $downloadLink->token)])
Download book
@endcomponent

This link will expire in 24 hours

Thanks,<br>
{{ config('app.name') }}
@endcomponent
