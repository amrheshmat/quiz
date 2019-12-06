@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1 class="quizcat select-cat"> @foreach($cat as $mycat){{$mycat->cat_name}}@endforeach Quizes</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="quiz">
                     @foreach($quiz1 as $myquiz)
                            <li class="quizli">
                                <a class="cat" href="{{ url('/quiz/'.$myquiz->quiz_name.'/'.$myquiz->id) }}">{{$myquiz->quiz_name}}</a>
                            </li>
                    @endforeach
                    </ul>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
