@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header select-cat result">Result</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="res">
                    <h1 >Result Percent</h1>
                    <hr>
                    <span >{{$result}} %</span>     
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
