@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header questiontitle select-cat">Questions</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ url('result1/'.$name.'/'.$id.'/') }}" method="post">
                        {{csrf_field()}}
                        <ul class="question">
                       @foreach($question as $myquestion)
                        <li>
                          <span class="question-name"> {{$myquestion->question_name}}</span><br>
                            <input type="radio" class="option-input radio" name="{{$name}}_{{$myquestion->id}}" value="1">
                            <span class="r">{{$myquestion->first_choose}}</span><br>
                            <input type="radio" class="option-input radio" name="{{$name}}_{{$myquestion->id}}" value="2"><span class="r">{{$myquestion->second_choose}}</span><br>
                            <input type="radio" class="option-input radio" name="{{$name}}_{{$myquestion->id}}" value="3"><span class="r">{{$myquestion->third_choose}}</span><br>
                            <input type="radio" class="option-input radio" name="{{$name}}_{{$myquestion->id}}" value="4"><span class="r">{{$myquestion->fourth_choose}}</span><br>
                        </li>
                        @endforeach
                        <input type="submit" name="quiz" value="result" class="btn btn-primary login_btn">
                          </ul>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
