@extends('master')

@section('content')
<h1>Adding Room</h1>

@if(session()->has('message'))
<p class="alert alert-success">{{session()->get('message')}}</p>
@endif

        @if($errors->any())
    	    @foreach($errors->all() as $message)
        	<p class="alert alert-danger">{{$message}}</p>
       	@endforeach
       	@endif

<form method='post' action="{{route('room.store')}}" enctype="multipart/form-data">
     @csrf
     <div class="form-group">
            <label for="room_type_id">Room Types</label>
            <select name="room_type_id" id="">
                @foreach($roomType as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
            </select>
    </div><br>
    <div class="form-group">
            <label for="room_name">Room Name</label>
            <input type="text"name="room_name"required class="form-control" id="name"  placeholder="Enter room name">
    </div>
    <div class="form-group">
            <label for="room_no">Room No</label>
            <input type="number"name="room_no"required class="form-control" id="name" placeholder="Enter room no">
    </div>

     <div class="form-group">
            <label for="type">Type</label>
            <input type="text"name="name" required class="form-control" id="name" placeholder="Enter Room Type">
    </div>
 
    <div class= "form-group">
        <label for="amount">Amount</label>
        <input type="number" name="amount"  required class="form-control" id="price" placeholder="Enter Amount" >
    </div>
   
      <div class= "form-group">
        <label for="accomodate">Accomodate</label>
        <input type="number" name="accomodate" required class="form-control" id="price" placeholder="Number of accomodation" min="1">
    </div>
    <div class= "form-group">
        <label for="Bed"> Bed</label>
        <input type="number" name="bed" required class="form-control" id="price" placeholder="Number of bed" min="1">
    </div>
    <div>
        <label for="Room_image">Upload Room Image</label>
        <input type="file" name="image" required class="form-control"id="image">
   </div><br>
  
   <div>
        <button type="submit" class="btn btn-primary">Submit</button>
   <input type="reset" class="btn btn-secondary">
   </div>

</form>







@endsection