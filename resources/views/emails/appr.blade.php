@component('mail::message')
Hi,

Your ration card with application number {{$applicant['application_no']}} has been renewed.
You can download your new ration card by visiting our website.
@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Homepage
@endcomponent

Thanks,<br>
Mercy
@endcomponent
