@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>Submit your Assignment</h1>
        <h1>You Already Submitted</h1>
    </div>
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <h1><em class="fas fa-tasks" style="color: orange; background:rgb(163, 81, 136);padding:8px; border:1px; border-radius:20px"></em> {{ $task->title }}</h1>
            
            <div class="card m-4">
                @if($task->img == "NULL")
                <embed src="{{asset($task->pdf)}}" width="100%" height="600px">
                <a href="{{asset($task->pdf)}}" download class="btn btn-primary" style="width: 160px">Download</a>
                @else
                <img class="card-img-top" src="{{asset($task->img)}}" alt="{{ $task->img }}">
                <a href="{{asset($task->img)}}" download class="btn btn-primary" style="width: 160px">Download</a>
                @endif
                <div class="card-body">
                    <div class="card-text">{!! $task->inst !!}</div>
                   
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="card" >
                <div class="card-body">
                  <h5 class="card-title">Submit Your Assingment</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{ $task->point }} Points</h6>
                  <form action="">
                    <input class="form-control" type="file" id="formFile">
                      <input type="submit" value="Submit" class="btn btn-primary mt-4">
                  </form>
                  
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
