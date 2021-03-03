
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
    .search input
    {
        width:100%;
    }
    .search
    {
        float:right;
    }
   
</style>

</head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/styletable.css">
    <title>Monitoring Report</title>
</head>
@section('content')

<body>
    <div class = "search">
        <form action = "/searchdcso" method = "get">
            <div class = "input-group">
                <input type = "search" name = "query" id = "query" class = "form-control">
                <span class = "input-group-prepend">
                    <button type = "submit" class = "btn btn-primary"> Search</button>
                </span>
            </div>
            <span style = "color:red" >@error('query') {{$message}} @enderror</span>
        </form>
    </div>
    

    <h2>APPLICANTS</h2>

    @if (Session::has('success'))
        <p class ="alert alert-success"><strong>{{session('success')}}</strong> </p>
    @endif

        <table style="width:100%">
        <tr>
            <th>#</th>
            <th>Name of Block</th>
            <th>Application Registration Number</th>
            <th>Name of Owner</th>
            <th>Name of Village</th>
            <th>Date of Application Received</th>
            <th>Application Accepted/ Rejected(Y/N)</th>
            <th>Date of Accepted/ Rejected</th>
            <th>Date of Ration Card Renewed</th>            
        </tr>

        @for ($i = 0; $i < count($persons); $i++)
        
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ NULL}}</td>
                <td>{{ $persons[$i]->application_no}}</td>
                <td>{{ $persons[$i]->family_head}}</td>
                <td>{{ NULL}}</td>
                <td>{{ $persons[$i]->monitoring->application_received_date}}</td>
                <td>{{ $persons[$i]->status}}</td>
                <td>{{ $persons[$i]->monitoring->application_status_date}}</td>
                <td>{{ $persons[$i]->monitoring->application_renewed_date}}</td>
            
            </tr>
        
        @endfor
       
        </table>
        {{$persons->links()}}
</body>
</html>

@endsection('content')
