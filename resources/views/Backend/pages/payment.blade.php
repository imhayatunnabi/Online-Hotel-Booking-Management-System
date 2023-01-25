@extends('master')

@section('content')
<h1>Payment</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Total Amount</th>
            <th scope="col">Paid Amount</th>
            <th scope="col">Due Amount</th>
            <!-- <th scope="col">Status</th> -->
        </tr>
        </thead>
        <tbody>
        @foreach($payment as $data)
        <tr>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->address}}</td>
            <td>{{$data->total_amount*$data->days}}</td>
            <td>{{$data->total_amount}}</td>
            <td>{{$data->total_amount*$data->days-$data->total_amount}}</td>
            <!-- <td>Due</td> -->
        </tr>
    @endforeach
        </tbody>
    </table>

@endsection