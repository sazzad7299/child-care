@extends('layouts.master')
@section('content')
<div id="main" class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

    <div class="bg-gray-800 ">
        <div class=" flex flex-wrap rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
            <h1 class="font-bold w-full md:w-1/2 xl:w-1/2 text-left ">Add Task</h1>
            <p class="font-bold w-full md:w-1/2 xl:w-1/2 text-right text-black "><a href="" class="rounded-sm px-3 bg-blue-400">All Task</a></p>
        </div>
    </div>
    <div class="w-full  p-6">
        <!--Table Card-->
        <div class="bg-white border-transparent rounded-lg shadow-xl">
            <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                <h2 class="font-bold uppercase text-gray-600">Form</h2>
            </div>
            <div class="p-5">
                <form class="w-full p-5 text-gray-700">
                    <div class="flex flex-wrap">
                      <label for="" class="font-bold">Name:</label>
                      <input type="text" name="name" id="" class="py-2 px-3 w-full" placeholder="">
                      
                    </div>
                    <div class="flex flex-wrap">
                        <label for="" class="font-bold w-full">Instructions:</label>
                        <textarea name="ins" class="py-2 px-3 w-full" id="summernote" ></textarea>
                    </div>
                </form>
            </div>
        </div>
        <!--/table Card-->
    </div>
</div>
@endsection