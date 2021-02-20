
@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> DETAILS</title>
    <style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    }
    th, td {
    padding: 10px;
    text-align: left;    
    }
    button
    {
        margin:auto;
        display:block;
    }
    </style>
</head>
@section('content')

<body>
    <h2>APPLICANTS DETAILED INFORMATION</h2>

    <table style="width:100%">
    <tr>
        <th>Family Members</th>
        <td>{{$single_record->family_members}}</td>
       
    </tr>
    <tr>
    <th>Family ages</th>
        <td>{{$single_record->family_age}}</td>
        </tr>
   </table>     