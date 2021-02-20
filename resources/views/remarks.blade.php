@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remarks</title>
</head>
<style>
    #remarks
    {
        font-size:20px;
    }
    #container {width:100%; text-align:center;}
    button
    {
        background-color: black;
        border-radius: 10px;
        border: 4px double #cccccc;
        color: #eeeeee;
    }
}
</style>
@section ('content')
<body>
    <form action="/applicants/{{$id}}/remarks/action" method = "post" enctype = "multipart/form-data">
    @csrf
    <div id="container">
    <textarea id="remarks" placeholder="Please state your remarks" name="rm" rows="5" cols="50">
   
    </textarea>
    <br><br>
    <button type="submit">Submit</button>
    <!-- <input type="submit" value="Submit" class = "btn"> -->

    </div>
    <br><br>
    </form>
  
</body>
</html>
@endsection('content')