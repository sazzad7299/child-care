@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1 class="text-success">{{Session::get('success')}}</h1>
       
    </div>
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <h1><em class="fas fa-tasks" style="color: orange; background:rgb(163, 81, 136);padding:8px; border:1px; border-radius:20px"></em> {{ $item->title }}</h1>
            
            <div class="card m-4">
                <img class="card-img-top" src="{{asset($item->img)}}" height="400" alt="{{ $item->img }}">
                {{-- <a href="{{asset($item->img)}}" download class="btn btn-primary" style="width: 160px">Download</a> --}}
                <a href="#" class="btn btn-danger col-md-4 mx-auto my-3">Buy</a> 
                
                <div class="card-body">
                    <div><h1><strong>Point:</strong> {{$item->point}}</h1></div>  
                    <div class="card-text">{!! $item->desc !!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
