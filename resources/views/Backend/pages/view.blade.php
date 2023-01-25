@extends('master')

@section('content')
<h1>Booking Details</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">User Name</th>
            <th scope="col">Booking Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rooms as $data)

        <tr>
            <td>{{$data->name}}</td>
            <td>{{$data->check_in_date}}</td>
        </tr>

     @endforeach
       
        
        </tbody>
    </table>

    

@endsection