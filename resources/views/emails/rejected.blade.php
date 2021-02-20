@component('mail::message')
Application Rejected

Your application has been rejected by the authority. 
Reg No {{$applicant['register_no']}}

<!-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent -->

Thanks,<br>
{{ config('app.name') }}
@endcomponent
