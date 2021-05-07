@component('mail::message')
Hi {{$name}},<br>
{{$message}} <br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent