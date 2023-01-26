@extends('master')

@section('content')
<h1>Amenities</h1>
<a href="{{route('amenities.create')}}" class ="btn btn-success" >Add Amenities</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
    <tbody>
        @foreach($amenity as $data)
        <tr>
            <td>{{$data->id}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->status}}</td>
            <td>
                <a href="{{route('admin.amenity.edit',$data->id)}}" class="btn btn-primary">Edit</a>
                <a href="{{route('amenity.delete',$data->id)}}" class="btn btn-danger">Delete</a>
        </td>
            @endforeach
       </tr>
        </tbody>
    </table>

@endsection