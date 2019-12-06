
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header select-cat result">Add Question</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ url('addquestion/'.$id.'/'.$id.'/') }}" method="post" s>
                        {{csrf_field()}}
                        <ul class="question">
                     @foreach($question as $myquestion)
                            <li>
                              <span> {{$myquestion->question_name}}</span><br>
                                <input type="radio" name="{{$name}}_{{$myquestion->id}}" value="1">{{$myquestion->first_choose}}<br>
                                <input type="radio" name="{{$name}}_{{$myquestion->id}}" value="2">{{$myquestion->second_choose}}<br>
                                <input type="radio" name="{{$name}}_{{$myquestion->id}}" value="3">{{$myquestion->third_choose}}<br>
                                <input type="radio" name="{{$name}}_{{$myquestion->id}}" value="4">{{$myquestion->fourth_choose}}<br>
                            </li>
                        @endforeach
                        </ul>
                        <input type="submit" name="quiz" value="Add New Questions" class="btn btn-primary login_btn2 ">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
