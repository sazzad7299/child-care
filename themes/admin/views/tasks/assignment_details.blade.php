@extends('layouts.master')

@section('content')

<div class="max-w-sm w-full lg:max-w-full lg:flex">
    <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('/img/card-left.jpg')" title="Woman holding a mug">
    </div>
    <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
      <div class="mb-8">
        <p class="text-sm text-gray-600 flex items-center">
            <h1 class=" w-full md:w-1/2 xl:w-1/2 text-right "><strong>Title:</strong> {{$task->title}}</h1>
            @if($assignment->img == "NULL")
            <embed src="{{asset($assignment->pdf)}}" width="100%" height="600px">
                <a href="{{asset($assignment->pdf)}}" download class="rounded-sm  bg-blue-400" >Download</a>
            @else
            <img src="{{asset($assignment->img)}}" class="object-scale-down h-60 w-96">
            <a href="{{asset($assignment->img)}}" download class="rounded-sm  bg-blue-400" >Download</a>

            @if($assignment->status==1)
            <a href="{{ route('admin.editStatus',['id'=>$assignment->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 rounded ">Approved</a>
           
            @else
            <a  href="{{ route('admin.editStatus',['id'=>$assignment->id]) }}" class="bg-red-500 hover:bg-blue-700 text-white font-bold px-4 rounded">Pending</a>
      
            @endif
            <a  href="{{ route('admin.returnStatus',['id'=>$assignment->id]) }}" class="bg-red-500 hover:bg-blue-700 text-white font-bold px-4 rounded">Return</a>

           
            <h1 class=" w-full md:w-1/2 xl:w-1/2 text-right "><strong>Subject:</strong> {{$task->topic}}</h1>
            <h1 class=" w-full md:w-1/2 xl:w-1/2 text-right "><strong>Point:</strong> {{$task->point}}</h1>
            @endif
        </p>
        <div class="text-gray-900 font-bold text-xl mb-2">{!!$task->inst !!}</div>
        <p class="text-gray-900 leading-none">{{$user->name}}</p>
        <p class="text-gray-600">{{$assignment->created_at}}</p>
      </div>
    </div>
  </div>
  
@endsection
