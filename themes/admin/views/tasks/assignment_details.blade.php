@extends('layouts.master')

@section('content')


<div class="max-w-sm w-full lg:max-w-full lg:flex">
    <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('/img/card-left.jpg')" title="Woman holding a mug">
    </div>
    <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
      <div class="mb-8">
        @if(Session::has('success'))
        <div x-data="{ show: true }" x-show="show" class="bg-green-400 border border-green-700 text-white px-4 py-3 rounded relative" role="alert">
          
            <span class="block sm:inline">{{ Session::get('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
              <svg @click="show = false" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
          </div>
          @endif
          @if(Session::has('error'))
          <div x-data="{ show: true }" x-show="show" class="bg-red-100 border border-red-700 text-red-400 px-4 py-3 rounded relative" role="alert">
              <strong class="font-bold">Error!</strong>
              <span class="block sm:inline">{{ Session::get('error') }}</span>
              <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg @click="show = false" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
              </span>
            </div>
          @endif
        <p class="text-sm text-gray-600 flex items-center">
            <h1 class=" w-full md:w-1/2 xl:w-1/2 "><strong>Title:</strong> {{$task->title}}</h1>
            @if($assignment->img == "NULL")
            <embed src="{{asset($assignment->pdf)}}" width="100%" height="600px">
            @else
            <img src="{{asset($assignment->img)}}" class="object-scale-down h-66 w-96">
            @endif

            <a class=" w-full md:w-1/2 xl:w-1/2"><strong>Subject:</strong> {{$task->topic}}</a>
            <a class="md:m-8"><i class="fas fa-trophy"></i>{{ $task->point }}</a>
            {{-- <h1 class=" w-full md:w-1/2 xl:w-1/2 text-right "><strong>Point:</strong> {{$task->point}}</h1> --}}
        </p>
        <div class="text-gray-900 font-bold text-xl">{!!$task->inst !!}</div>
        <p class="text-gray-900 leading-none">{{$user->name}}</p>
        <p class="text-gray-600">{{$assignment->created_at}}</p>

        @if($assignment->img == "NULL")
        <a href="{{asset($assignment->pdf)}}" download class="rounded-sm  bg-blue-400 hover:bg-blue-700" >Download</a>
        @else
        <a href="{{asset($assignment->img)}}" download class="rounded-sm  bg-blue-400 hover:bg-blue-700" >Download</a>
        @endif

        @if($assignment->status==1)
        <a href="{{ route('admin.editStatus',['id'=>$assignment->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 mx-4 rounded ">Approved</a>
       
        @else
        <a  href="{{ route('admin.editStatus',['id'=>$assignment->id]) }}" class="bg-yellow-500 hover:bg-blue-700 text-white font-bold px-4 rounded">Pending</a>
  
        @endif
        <a  href="{{ route('admin.returnStatus',['id'=>$assignment->id]) }}" class="bg-red-500 hover:bg-blue-700 text-white font-bold px-4 rounded">Return</a>

        <form action="{{ route('admin.add_extra_point') }}" method="post">
          @csrf
           <label for="">Additional point for Behaviour</label><br>
            <input type="number" name="point" placeholder="point for Behaviour" min="1">
           {{-- <input  type="hidden" name="user_id" value="{{ Auth::user()->id }}" > --}}
           <input  type="hidden" name="id" value="{{ $assignment->id }}" >
           <input type="submit" value="Add-Point" class="bg-green-500 hover:bg-blue-700 text-white font-bold">
      </form> 
      </div>
    </div>
  </div>
  
@endsection
