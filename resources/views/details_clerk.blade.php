@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/styletable.css">
    <title>{{$single_record->register_no}} DETAILS</title>
 
</head>
@section('content')

<body>
    
    <h2 style = "text-align:center">APPLICANT DETAILED INFORMATION</h2>

    <table class="center">

    <tr>
        <th>Registration Number</th>
        <td>{{$single_record->register_no}}</td>
    </tr>

    <tr>
        <th>Ration Card Number</th>
        <td>{{$single_record->ration_no}}</td>
    </tr>
    
    <tr>
        <th>Door Number</th>
        <td>{{$single_record->door_no}}</td>
    </tr>

    <tr>
        <th>Sub Locality</th>
        <td>{{$single_record->sub_locality}}</td>
    </tr>

   <tr>
        <th>Sub Locality2</th>
        <td>{{$single_record->sub_locality2}}</td>
    </tr>

    <tr>
        <th>Ward door number</th>
        <td>{{$single_record->ward_no}}</td>
    </tr>

    <tr>
        <th>Address</th>
        <td>{{$single_record->location}}</td>
    </tr>

    <tr>
        <th>Police Station</th>
        <td>{{$single_record->police_station}}</td>
    </tr>

    <tr>
        <th>Post Office</th>
        <td>{{$single_record->post_office}}</td>
    </tr>

    <tr>
        <th>Sub_District</th>
        <td>{{$single_record->sub_district}}</td>
    </tr>
    
    <tr>
        <th>State</th>
        <td>{{$single_record->state}}</td>
    </tr>
   
    <tr>
        <th>Gender</th>
        <td>{{$single_record->gender}}</td>
    </tr>  
    
    <th>Appellation</th>
        <td>{{$single_record->appellation}}</td>
    </tr>
    
    <th>Suffix</th>
        <td>{{$single_record->suffix}}</td>
    </tr>

    <tr>
        <th>Head of Family</th>
        <td>{{$single_record->family_head}}</td>
    </tr>
    
    <tr>
        <th>Monthly Income</th>
        <td>{{$single_record->monthly_income}}</td>
    </tr>
    
    <tr>
        <th>Date of Birth</th>
        <td>{{$single_record->dob}}</td>
    </tr>
 
    <tr>
        <th>Family Members</th>
        <td>{{$single_record->family_member}}</td>
    </tr>

    <tr>
        <th>Age of Family Members</th>
        <td>{{$single_record->age}}</td>
    </tr>

    <th>Residing Period of Above Address</th>
        <td>{{$single_record->residing_period}}</td>
    </tr>

    <tr>
        <th>Occupation</th>
        <td>{{$single_record->occupation}}</td>
    </tr>

    <tr>
        <th>Religion</th>
        <td>{{$single_record->religion}}</td>
    </tr>
    
    <tr>
        <th>Electricity Connection</th>
        <td>{{$single_record->electricity}}</td>
    </tr>
    
    <tr>
        <th>Gas Connection</th>
        <td>{{$single_record->gas}}</td>
    </tr>
    
    <tr>
        <th>Scanned Documents</th>
        <td>{{$single_record->documents}}</td>
    </tr>

    <tr>
        <th>Note Sheet File Number</th>
        <td>{{$single_record->note_sheet_no}}</td>
    </tr>

    <tr>
        <th>Note Sheet</th>
        <td>{{$single_record->note_sheet}}</td>
    </tr>

    <tr>
        <th>Remarks</th>
        <td>{{$single_record->remarks}}</td>
    </tr>

    <tr>
        <th>Document</th>
        <td><a href="/storage/documents/{{$single_record->scanned_documents}}" target="_blank">Click mee &ensp;</a>
        <a href="/download/{{$single_record->scanned_documents}}"> Download</a></td>
      
    </tr>
    
    </table>
    <form action = "/applicants_clerk/{{$single_record->id}}/action"  method = "POST" enctype = "multipart/form-data">
    @csrf
    <div class = "wrapper">
            <button type ="submit" class = "btn btn-success btn-lg" name = "issue" id = "button1">UPDATE</button>
            <button type ="submit" class = "btn btn-danger btn-lg" name = "reject" id = "button2">REJECT</button>
    </div>
    </form>
</body>
</html>
@endsection('content')
