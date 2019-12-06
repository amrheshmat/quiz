@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header select-cat result">Your Informations </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="res">
                    <h1 >Personal Information</h1>
                    <hr>
                    @foreach($users as $user)
                    <span >Name : {{$user->name}}</span>  <br>
                    <span >Email : {{$user->email}}</span>  
                    @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



