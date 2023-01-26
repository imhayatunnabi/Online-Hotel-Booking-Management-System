@extends('master')

@section('content')
<h1>Rooms List</h1>

@if(session()->has('message'))
<p class="alert alert-success">{{session()->get('message')}}</p>
@endif

<a href="{{route('rooms.create')}}"class="btn btn-success">Add Rooms</a>
<table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Room image</th>
            <th scope="col">Room Name</th>
            <th scope="col">Room Type ID</th>
            <th scope="col">Room No</th>
            <th scope="col">Type</th>
            <th scope="col">Amount</th>
            <th scope="col">No of Accomodate</th>
            <th scope="col">No of Bed</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach($room as $key=> $data)
        <tr>
            <td>{{$key + $room->firstItem()}}</td>
            <td>
            <img src="{{url('/uploads/'.$data->room_image)}}"style="height:80px; width:100px"alt="Room Image">
            </td>
            <td>{{$data->name}}</td>
            <td>{{$data->room_type_id}}</td>
            <td>{{$data->room_no}}</td>
            <td>{{$data->type}}</td>
            <td>{{$data->amount}}</td>
            <td>{{$data->no_of_accomodate}}</td>
            <td>{{$data->bed}}</td>           
            <td>
                <a href="{{route('room.edit',$data->id)}}" class="btn btn-outline-primary">Edit</a>
                <a href="{{route('room.delete',$data->id)}}" class="btn btn-outline-danger">Delete</a>
                <a href="{{route('room.view',$data->id)}}" class="btn btn-outline-success">View</a>
            </td>
        </tr>

     @endforeach
    </tbody>
    
    </table>
 
    {{$room->links()}}
@endsection