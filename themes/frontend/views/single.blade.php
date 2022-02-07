@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1 class="text-success">{{Session::get('success')}}</h1>
    </div>
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <h1><em class="fas fa-tasks" style="color: orange; background:rgb(163, 81, 136);padding:8px; border:1px; border-radius:20px"></em> {{ $task->title }}</h1>
            
            <div class="card m-4">
                @if($task->img == "NULL")
                <embed src="{{asset($task->pdf)}}" width="100%" height="600px">
                <a href="{{asset($task->pdf)}}" download class="btn btn-primary my-3 mx-auto" style="width: 160px">Download</a>
                @else
                <img class="card-img-top" src="{{asset($task->img)}}" alt="{{ $task->img }}" height="400">
                <a href="{{asset($task->img)}}" download class="btn btn-primary my-3 mx-auto" style="width: 100px">Download</a>
                @endif
                <div class="card-body">
                    <div class="card-text text-center"><strong>{!! $task->inst !!}</strong></div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="card" >
                <div class="card-body">
                
            @php($data= App\Models\Std_assignment::where('user_id',Auth::user()->id)
            ->where('task_id',$task->id)->first())

                @if(empty($data))
                <h5 class="card-title">Submit Your Assingment</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $task->point }} Points</h6>
                <form action="{{ route('PostAssignment') }}" method="post" enctype="multipart/form-data">
                  @csrf
                   <input  type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                   <input  type="hidden" name="task_id" value="{{$task->id}}" >
                   <input class="form-control" type="file" name="file" accept=".png, .jpg, .pdf" id="formFile">
                    <input type="submit" value="Submit" class="btn btn-primary mt-4">
                </form>

                  @elseif($data->status==3)

                  <h5 class="card-title">Submit Your Assingment</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{ $task->point }} Points</h6>
                  <form action="{{ route('UpdateAssignment') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                     <input class="form-control" type="file" name="file" accept=".png, .jpg, .pdf" id="formFile">
                      <input type="submit" value="Update" class="btn btn-primary mt-4">
                  </form>

                  @else
                  <h5 class="card-title">Already Submit Your Assingment</h5>
                 
                  @endif

                </div>
              </div>
        </div>
    </div>
</div>
@endsection
