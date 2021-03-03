
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
    .search
    {
        float:right;
    }

</style>
   
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
    @if($status == "submitted")  
    <div class = "search">
        <form action = "/searchdcso" method = "get">        
            <div class = "input-group">
                <input type = "search" name = "query" id = "query" value = "{{old('query')}}"class = "form-control" placeholder = "application number">
                <span class = "input-group-prepend">
                    <button type = "submit" class = "btn btn-primary"> Search</button>
                </span>
            </div>
            <span style = "color:red" >@error('query') {{$message}} @enderror</span>
        </form>
    </div>
    
    @elseif ($status == "forwarded")
    
    <div class = "search">
        <form action = "/searchclerk" method = "get">        
            <div class = "input-group">
                <input type = "search" name = "query" id = "query" value = "{{old('query')}}"class = "form-control" placeholder = "application number">
                <span class = "input-group-prepend">
                    <button type = "submit" class = "btn btn-primary"> Search</button>
                </span>
            </div>
            <span style = "color:red" >@error('query') {{$message}} @enderror</span>
        </form>
    </div>
@endif

    <h2>APPLICANTS</h2>

    @if (Session::has('success'))
        <p class ="alert alert-success"><strong>{{session('success')}}</strong> </p>
    @endif

    @if (count($results) > 0)
        <table style="width:100%">
        <tr>
            <th>#</th>
            <th>Application Number</th>
            <th>Head of the Family</th>
            <th>Dated</th>
            <th>Form Status</th>
            
        </tr>
        
        @foreach ($results as $person)
        
            <tr>
                <td>{{$person->id}}</td>
                @if( $status == "submitted")
                    <td><a href = "/applicants/{{$person->id}}">{{$person->application_no}}</a></td>
                @elseif ($status == "forwarded")
                <td><a href = "/applicants_clerk/{{$person->id}}">{{$person->application_no}}</a></td>
                @endif
                <td>{{$person->family_head}}</td>
                <td>{{ date("d M Y"), strtotime ($person->updated_at) }}</td>
                <td>{{$person->status}}</td>

            </tr>
        @endforeach       
        
        </table>
        <div id = "center">
            {{$results->links()}}
        </div>
    @else
        NO MATCHING RESULT FOUND
    @endif
    


</body>
</html>

@endsection('content')
