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
                
                <img class="card-img-top" src="{{asset($item->img)}}" alt="Card image cap" style="max-height: 200px">
                <div class="card-body">
                    <h5 class="card-title">{{$item->title}}</h5>
                    <div class="card-text">{!! Str::limit($item->inst, 200)  !!}</div>
                    <a href="#" class="btn btn-danger">Buy</a> <a href="#" class="btn btn-primary">View</a><a class=""> <i class="fas fa-trophy"></i>{{ $item->point }}</a>
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
                
                <img class="card-img-top" src="{{asset($item->img)}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$item->title}}</h5>
                    <div class="card-text">{!! Str::limit($item->desc, 200)  !!}</div>
                    <a href="#" class="btn btn-danger">Buy</a> <a href="#" class="btn btn-primary">View</a><a class=""> <i class="fas fa-trophy"></i>{{ $item->point }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
