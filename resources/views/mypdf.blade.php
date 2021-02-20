<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$applicant->register_no}}</title>
</head>
<style>
    body
    {
        border-style:solid;
    }
    p
    {
        font-size:30px;
        text-align:center;
    }
    .extra
    {
        font-size:20px;
        text-align:left;
    }
    .extra2
    {
        font-size:20px;
        text-align:right;
        font-weight:20px;

    }
</style>
<body>
<h1 style = "text-align:center"><u>Acknowledgement</u></h1>

<p class = "para">This is to acknowledge the receipt </p>
<p>RENEWAL OF RATION CARD</p>
<p>with Application Number <u>{{$applicant->register_no}}</u> </p>
<p>dated on <u>{{$applicant->created_at}}</u></p>
<!-- <p>to the <u>{{$applicant->family_head}}</u></p> -->
<p>has been <u>SUBMITTED</u></p>

<p class = "extra">Place: Aizawl </p>
<p class = "extra">Date: {{$applicant->created_at}}</p>

<p class = "extra2">Registering Authority</p>
<p class = "extra2">Aizawl, Mizoram</p>

</body>
</html>