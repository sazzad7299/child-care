@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">AlL Orders</h1>
    </div>

    @if(empty($purchases))
    <h1>Not found any order</h1>
    @else
    <table id="dataTable" class="table table-bordered">
        <thead>
          <tr class="text-center" style="background:rgb(35, 35, 245)">
            <th scope="col" class="text-white">#.</th>
            <th scope="col" class="text-white">Name</th>
            <th scope="col" class="text-white">item Name</th>
            <th scope="col" class="text-white">Item Image</th>
            <th scope="col" class="text-white">Point</th>
            <th scope="col" class="text-white">Status</th>
            {{-- <th scope="col" class="text-white">Action</th> --}}
          </tr>
        </thead>
        <tbody>
            @php($i=1)
          @foreach ($purchases as $purchase)
          @php(
            $user=\DB::table('users')->where('id',$purchase->user_id)->first()
          )
          @php($item= \DB::table('items')->where('id',$purchase->item_id)->first())
            <tr class="text-center">
                <td class="border px-4 py-2">{{$i++}}</td>
                <td class="border px-4 py-2">{{$user->name}}</td>
                <td class="border px-4 py-2">{{$item->title }}</td>
                <td class="border px-4 py-2"><img src="{{asset($item->img)}}" height="60" width="60" alt=""></td>
                <td class="border px-4 py-2">{{$item->point }}</td>
                @if($purchase->status==1)
                <td class="border px-4 py-2">Approved</td>
                @else
                <td class="border px-4 py-2">Pending</td>
                @endif
            </tr>
            @endforeach
        </tbody>
      </table>

      @endif
</div>   

@endsection
