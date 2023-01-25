@extends('frontend.webside')

@section('content')
<h1>Available Room</h1>
<table class="table">
        <thead>
        <tr>
            <th scope="col">Room image</th>
            <th scope="col">Room Name</th>
            <th scope="col">Room No</th>
            <th scope="col">Amount</th>
            <th scope="col">Room Details</th>
        </tr>
        </thead>

        <tbody>
        @foreach($rooms as $data)
        <tr>
            <td>
            <img src="{{url('/uploads/'.$data->room_image)}}"style="height:150px; width:250px"alt="My Image">
            </td>
            <td>{{$data->name}}</td>
            <td>{{$data->room_no}}</td>
            <td>{{$data->amount}}</td>
            <td>
            <a href="{{route('room.view',$data->id)}}" class="btn btn-outline-primary">View Room</a>
           </td>
        </tr>

     @endforeach
    </tbody>
    
    </table>
 
@endsection