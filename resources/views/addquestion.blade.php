@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header select-cat result">Add New Question</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{ url('/questioninsert/'.Auth::user()->id) }}">
                        {{ csrf_field() }}
                        <label>Question Name</label>
                        <input type="text" name="admin_question_name" placeholder="Enter Quiz Name" class="form-control q" required>
                        <label>First choose</label>
                        <input type="text" name="first_choose" class="form-control  q">
                        <label>Second choose</label>
                        <input type="text" name="second_choose" class="form-control q">
                        <label>Third choose</label>
                        <input type="text" name="third_choose" class="form-control q">
                        <label>Fourth choose</label>
                        <input type="text" name="fourth_choose" class="form-control q">
                        <label>Number Of The Correct Choose</label>
                        <select class="form-control q" name="admin_correct_choose ">
                           <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <input type="hidden" name="quiz_id" value="{{$id}}">
                        <input type="submit" value="Add" name="insertquestion" class="btn btn-dange login_btn2 b">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
