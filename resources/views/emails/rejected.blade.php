@component('mail::message')
Application Rejected

Your application no {{$applicant['application_no']}} has been rejected by the authority. 
Remarks from the officer : 
{{$applicant['remarks']}}

<!-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent -->

Thanks,<br>
Mercy
@endcomponent
