@extends('master')

@section('content')
<h1>Guests Message List</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
        </tr>
        </thead>
        <tbody>
        @foreach($guest as $data)
        <tr>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->subject}}</td>
            <td>{{$data->massage}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection