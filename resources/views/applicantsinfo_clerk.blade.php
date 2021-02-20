
@extends('layouts.app')


<!DOCTYPE html>
<html lang="en">

<style>
    th
    {
        background-color:black;
        color:white;
    }

</style>

</head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants Information</title>
    <link rel="stylesheet" type="text/css" href="/css/styletable.css">
    
</head>

@section('content')
<body>

    <h2>APPLICANTS</h2>
    @if (count($persons) > 0)
        <table style="width:100%">
        <tr>
            <th>#</th>
            <th>Registration Number</th>
            <th>Head of the Family</th>
            <th>Created At</th>
            <th>Form Status</th>
            

        </tr>
        @foreach ($persons as $person)
            <tr>
                <td>{{$person->id}}</td>
                <td><a href = "/applicants_clerk/{{$person->id}}">{{$person->register_no}}</a></td>
                <td>{{$person->family_head}}</td>
                <td>{{$person->created_at}}</td>
                <td>{{$person->status}}</td>

            </tr>
        @endforeach       
        
        </table>

    @else
        NOTHING TO SEE HERE
    @endif
  
</body>
</html>


@endsection('content')