@extends('layouts.master')
@section('content')
<div id="main" class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

    <div class="bg-gray-800 ">
        <div class=" flex flex-wrap rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
            <h1 class="font-bold w-full md:w-1/2 xl:w-1/2 text-left ">View Item</h1>
            <p class="font-bold w-full md:w-1/2 xl:w-1/2 text-right text-black "><a href="{{ route('admin.addItem') }}" class="rounded-sm px-3 bg-blue-400">Add Item</a></p>
        </div>
    </div>

    <div class="w-full  p-10">

        @if(Session::has('success'))
    <div x-data="{ show: true }" x-show="show" class="bg-green-400 border border-green-700 text-white px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Holy smokes!</strong>
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

      <table class="table-fixed w-full">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 w-20">#.</th>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Point</th>
                <th class="px-4 py-2">Image</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
          @php($i=1)
          @foreach ($items as $item)
            <tr class="bg-gray-100">
                <td class="border px-4 py-2">{{$i++}}</td>
                <td class="border px-4 py-2">{{$item->title}}</td>
                <td class="border px-4 py-2">{!!$item->desc !!}</td>
                <td class="border px-4 py-2">{{$item->point}}</td>
                <td class="border px-4 ">
                  <img src="{{asset($item->img)}}" alt="">
                </td>
                <td class="border px-4 py-2">
                  <a type="btn" href="{{ route('admin.editItem',['id'=>$item->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                    <a type="btn" href="{{ route('admin.deleteItem',['id'=>$item->id]) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection
