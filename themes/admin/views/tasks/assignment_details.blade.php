@extends('layouts.master')

@section('content')
<div id="main" class="content-center main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5" >

  <div class="bg-gray-800 ">
      <div class=" flex flex-wrap rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
          <h1 class="font-bold w-full md:w-1/2 xl:w-1/2 text-left ">View Assignment</h1>
      </div>
  </div>

<div class="md:w-4/5 bg-white mx-auto ">
    <div class="border-r content-between	 border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
      <div class="mb-10">
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
            <h1 class=" w-full md:w-1/2 xl:w-1/2 "><strong>Assignment PDF:</strong> </h1>
            <embed src="{{asset($assignment->pdf)}}" width="100%" height="500px">
            @else
            <h1 class=" w-full md:w-1/2 xl:w-1/2 "><strong>Assignment Image:</strong> </h1>
            <embed src="{{asset($assignment->img)}}" width="100%" height="500px">
              {{-- <img src="{{asset($assignment->img)}}" width="80%" > --}}
          
            @endif

            <a class=" w-full md:w-1/2 xl:w-1/2"><strong>Subject:</strong> {{$task->topic}}</a>
            <a class="md:m-8"><i class="fas fa-trophy"></i>{{ $task->point }}</a>
            {{-- <h1 class=" w-full md:w-1/2 xl:w-1/2 text-right "><strong>Point:</strong> {{$task->point}}</h1> --}}
        </p>

        <h1 class="font-bold"> Instructions</h1>
        <div class="px-5">
          {!!$task->inst !!}
        </div>
        <div>
          <span class="font-bold">Submitted by:</span> {{$user->name}}
          <span class="font-bold">Submitted At:</span> {{$assignment->created_at}}
        </div>

        @if($assignment->img == "NULL")
        <a href="{{asset($assignment->pdf)}}" download >
          <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
            <span>Download</span>
          </button>
        </a>
        @else
        
        <a href="{{asset($assignment->img)}}" download>
          <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
          <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
          <span>Download</span>
        </button>
      </a>
        @endif

        @if($assignment->status==1)
        <a href="{{ route('admin.editStatus',['id'=>$assignment->id]) }}">
          <button class="bg-blue-500 hover:bg-gray-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
            Approved
          </button>
          </a>
       
        @else
        <a  href="{{ route('admin.editStatus',['id'=>$assignment->id]) }}">
          <button class="bg-yellow-500 hover:bg-gray-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
            Pending
          </button>
          </a>
  
        @endif
        @if($assignment->status!=3)
        <a  href="{{ route('admin.returnStatus',['id'=>$assignment->id]) }}">
          <button class="bg-red-500 hover:bg-gray-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
            Return
          </button>
          </a>
        @endif

        <form action="{{ route('admin.add_extra_point') }}" method="post">
          @csrf
           <label for="">Additional point for Behaviour</label><br>
            <input type="number" name="point" placeholder="point for Behaviour" min="1" required>
           <input  type="hidden" name="id" value="{{ $assignment->id }}" >
           <button type="submit" class="bg-green-500 hover:bg-gray-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
            Add-Point
          </button>
      </form> 
      </div>
    </div>
  </div>
</div>

  
@endsection
