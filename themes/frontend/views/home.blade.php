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
                <embed src="{{asset($task->pdf)}}"  height= "200">
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
    <div class="text-center">
        <h1>ITEMS</h1>
    </div>
    <div class="row">
        @foreach($items as $item)
        <div class="col-md-4">
            <div class="card m-4">
                <img class="card-img-top" src="{{asset($item->img)}}" alt="{{ $item->img }}" style="max-height: 200px">
                <div class="card-body">
                    <h5 class="card-title">{{$item->title}}</h5>
                    <div class="card-text">{!! Str::limit($item->desc, 200)  !!}</div>
                   <a class="item-point"><i class="fas fa-trophy"></i>{{ $item->point }}</a>
                    <form action="{{ route('item_buy') }}" method="post">
                        @csrf
                         <input  type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                         <input class="form-control" type="hidden" name="item_id" value="{{$item->id}}">
                         <input class="form-control" type="hidden" name="point" value="{{$item->point}}">
                        <br><br>
                        <a href="{{ url('item/'.$item->id) }}" class="btn btn-primary btn-block">View</a>
                        <input type="submit" value="Buy" class="btn btn-danger btn-block">
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        </div>
</div>
@endsection
