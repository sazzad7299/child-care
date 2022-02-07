@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>Assignment</h1>
    </div>
    <div class="row">
        @foreach($tasks as $task)
        <div class="col-md-4">
            <div class="card m-4">
                @if($task->img == "NULL")
                <embed src="{{asset($task->pdf)}}" height= "200">
                @else
                <img class="card-img-top" src="{{asset($task->img)}}" alt="{{ $task->img }}" style="max-height: 200px">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{$task->title}}</h5>
                    <div class="card-text">{!! Str::limit($task->inst, 200)  !!}</div>
                    <a href="{{ url('assignment/'.$task->id) }}" class="btn btn-primary">View</a><a class="item-point"><i class="fas fa-trophy"></i>{{ $task->point }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
