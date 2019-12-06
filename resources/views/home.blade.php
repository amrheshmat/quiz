@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header1 select-cat">Select Categories</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="category">
                        @foreach($cat as $mycat)
                                <li >
                                    <a class="cat" href="{{ url('/cat/'.$mycat->cat_name.'/'.$mycat->id) }}">{{$mycat->cat_name}}</a>
                                </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
