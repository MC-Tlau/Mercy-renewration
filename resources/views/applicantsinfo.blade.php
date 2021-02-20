
@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>

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
    <link rel="stylesheet" type="text/css" href="/css/styletable.css">
    <title>Applicants Information</title>
</head>
@section('content')

<body>

    <h2>APPLICANTS</h2>
    @if (Session::has('success'))
        <p class ="alert alert-success"><strong>{{session('success')}}</strong> </p>
    @endif

    @if (count($persons) > 0)
        <table style="width:100%">
        <tr>
            <th>#</th>
            <th>Registration Number</th>
            <th>Head of the Family</th>
            <th>Dated At</th>
            <th>Form Status</th>
            

        </tr>
        @foreach ($persons as $person)
        
            <tr>
                <td>{{$person->id}}</td>
                <td><a href = "/applicants/{{$person->id}}">{{$person->register_no}}</a></td>
                <td>{{$person->family_head}}</td>
                <td>{{$person->date}}</td>
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
