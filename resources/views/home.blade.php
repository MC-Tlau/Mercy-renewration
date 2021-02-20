@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    You are logged in!
                    @if ( auth()->user()->role == 1)
                        <p><a href = "/testform">CONTINUE TO FORM</a></p>

                        @if (Session::has('success'))
                       
                        <p class ="alert alert-success">{{session('success')}}</p>
                        <p><a href = "/pdf/{{session('user')}}">Click here to download acknowledgement receipt</a></p>
                        
                        @endif

                    @elseif ( auth()->user()->role == 2)
                        <p><a href = "/applicants">CONTINUE </p>
                    @elseif ( auth()->user()->role == 3)
                        <p><a href = "/applicants_clerk">CONTINUE </p> 
                    @endif

                         
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
