@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header select-cat result">Add Quiz</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{ url('/quizinsert/'.Auth::user()->id) }}"  class="form">
                        {{ csrf_field() }}
                        <label>Quiz Name</label>
                        <input type="text" name="admin_quiz_name" placeholder="Enter Quiz Name" class="form-control q" required>
                        <label>Category Name</label>
                        <select class="form-control q" name="admin_cat_id">
                            @foreach($cat as $category)
                            <option value="{{$category->id}}" class="q">{{$category->cat_name}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="admin_id" value="{{Auth::user()->id}}">
                        <input type="submit" value="Add" name="insertQuiz" class="btn b login_btn2">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
