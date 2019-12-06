@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header select-cat result">Quizes</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="question">
                   @foreach($adminquiz as $adminq)
                      <li>  <a href="{{ url('editquiz/'.$adminq->quiz_name.'/'.$adminq->id) }}">{{$adminq->quiz_name}}</a></li><br>
                    @endforeach
                    </ul>
                    <a class="navbar-brand btn  login_btn2"  href="{{ url('/addquiz/'.Auth::user()->id.'/') }}">
                           Add New Quiz
                     </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
