@component('mail::message')

From:{{$data['name']}} <br>
Email:{{$data['email']}}<br>

Message:{{$data['message']}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
