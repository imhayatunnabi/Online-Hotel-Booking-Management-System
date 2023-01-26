@extends('master')

@section('content')
<h1>Booking List</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">User Name</th>
            <th scope="col">User Email</th>
             <th scope="col">Address</th>
            <th scope="col">Contact No</th>
            <th scope="col">Room_Name</th>
            <th scope="col">Room_No</th>
            <th scope="col">No of Days</th>
            <th scope="col">Total Amount</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rooms as $data)

        <tr>
            <td>{{$data->id}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
             <td>{{$data->address}}</td>
            <td>{{$data->contact}}</td>
            <td>{{$data->roomRelation->name}}</td>
            <td>{{$data->roomRelation->room_no}}</td>
            <td>{{$data->days}}</td>
            <td>{{$data->total_amount*$data->days}}</td>
            <td>{{$data->status}}</td>
            <td>
                <a href="{{route('approved',$data->id)}}" class="btn btn-primary">Approved</a>
                <a href="{{route('disapproved',$data->id)}}" class="btn btn-warning">Disapproved</a>
                <a href="{{route('booking.details',$data->id)}}" class="btn btn-info">View</a>
            </td>
        </tr>

     @endforeach
       
        
        </tbody>
    </table>

@endsection