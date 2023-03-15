@component('mail::message')
# Introduction

Thanks for making purchase here are details of your order.
-Name: {{$purchase->name}}
-Address: {{$purchase->address}}
-City: {{$purchase->city}}
# Items 

@foreach(json_decode($purchase->items) as $index => $item)
		
{{$index+1}}: {{\App\Project::find($item)->name}} 
		
@endforeach


I'm TALL Stack Developer.
@component('mail::button', ['url' => 'https://www.linkedin.com/in/adnan-zaib-devinlara'])
My LinkedIn Profile
@endcomponent



Thanks,<br>
{{ config('app.name') }}
@endcomponent
