@extends('master')

@section('content')

<h2> Room Update </h2>

@if(session()->has('message'))
<p class="alert alert-success">{{session()->get('message')}}</p>
@endif

<form method='POST' action="{{route('admin.room.update',$room->id)}}" enctype="multipart/form-data">
    @method('put')
     @csrf
     <div class="form-group">
            <label for="name">Enter Name</label>
            <input type="text"value="{{$room->name}}"name="room_name"required class="form-control" id="name" placeholder="Enter room type">
    </div>
    <div class= "form-group">
        <label for="amount">Amount</label>
        <input type="number"value="{{$room->amount}}" name="amount" class="form-control" id="price" placeholder="Enter Amount">
    </div>

    <div>
        <label for="image">Upload Image</label>
        <input type="file"value="{{$room->room_image}}" name="image" required class="form-control"id="image">
   </div>
   <div><br>
        <button type="submit" class="btn btn-primary">Update</button>
   <input type="reset" class="btn btn-secondary">
   </div>

</form>

@endsection