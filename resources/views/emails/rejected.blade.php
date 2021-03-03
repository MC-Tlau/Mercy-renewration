@component('mail::message')
Application Rejected

Your application no {{$applicant['application_no']}} has been rejected by the authority. 
<br>
Remarks from the officer : 
{{$applicant['remarks']}}



Thanks,<br>
Mercy
@endcomponent
