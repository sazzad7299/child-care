@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>Assignment</h1>
    </div>
    <div class="row">
        
        @foreach($tasks as $item)
        <div class="col-md-4">
            <div class="card m-4">
                @if($item->img == "NULL")
                <embed src="{{asset($item->pdf)}}"  height= "200">
                @else
                <img class="card-img-top" src="{{asset($item->img)}}" alt="{{ $item->img }}" style="max-height: 200px">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{$item->title}}</h5>
                    <div class="card-text">{!! Str::limit($item->inst, 200)  !!}</div>
                    <a href="{{ url('home/assignment/'.$item->id) }}" class="btn btn-primary">View</a><a class="item-point"><i class="fas fa-trophy"></i>{{ $item->point }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
