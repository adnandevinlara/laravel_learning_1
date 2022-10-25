@component('mail::message')
# Introduction
# {{$data['title']}}
Wellcome to our application adnan zaib.
email {{$data['email']}}
{{$data['body']}}
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
