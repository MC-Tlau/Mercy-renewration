@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('USERS INFO') }}</div>
                <div class="card-body">
             
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>
                        <td>
                        <a href = "/admin/edit/{{$user->id}}"><button type="button" class="btn btn-primary">Edit</button>
                        <a href = "/admin/destroy/{{$user->id}}"><button type="button" class="btn btn-dark">Delete</button>

                        </td>
                    </tr>
                    
                    @endforeach             
                    
                    </tbody>
                    </table>
               
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
