
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Applicants Information</title>
</head>
@section('content')

<body>
    @if($status == "submitted")  
    <div class = "search">
        <form action = "/searchdcso" method = "get">        
            <div class = "input-group">
                <input type = "search" name = "query" id = "query" value = "{{old('query')}}"class = "form-control" >
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
                <input type = "search" name = "query" id = "query" value = "{{old('query')}}"class = "form-control" >
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
            <th>View</th>
            
        </tr>
        
      
        @for ($i = 0; $i < count($results); $i++)
        
            <tr>
                <td>{{$i+1}}</td>
                <td>{{$results[$i]->application_no}}</td>
                <td>{{$results[$i]->family_head}}</td>
                <td>{{ date("d M Y"), strtotime ($results[$i]->updated_at) }}</td>
                <td>{{$results[$i]->status}}</td>
                @if($status == "submitted")
                <td><a href = "/applicants/{{$results[$i]->id}}"><i class = "fa fa-eye"style =" font-size:23px"></i></a></td>
                @elseif ($status == "forwarded")
                <td><a href = "/applicants_clerk/{{$results[$i]->id}}"><i class = "fa fa-eye"style =" font-size:23px"></i></a></td>
                @endif
                

            </tr>
        @endfor     
        
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
