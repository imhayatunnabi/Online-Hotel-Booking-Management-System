@extends('master')

@section('content')

<h2>Adding Room_type </h2>
         @if($errors->any())
    	    @foreach($errors->all() as $message)
        	<p class="alert alert-danger">{{$message}}</p>
       	@endforeach
       	@endif

@if(session()->has('message'))
<p class="alert alert-success">{{session()->get('message')}}</p>
@endif

<form method='POST' action="{{route('room_type.store')}}" enctype="multipart/form-data">
     @csrf
     <div class="form-group">
          <label for="name">Enter Name</label>
          <input type="text" name="room_name" required class="form-control" id="name" placeholder="Enter room type">
     </div>


     <div class="form-group">
          <label for="amount">Amount</label>
          <input type="number" name="amount" class="form-control" id="price" required placeholder="Enter Amount">
     </div>

     <div>
          <label for="image">Upload Image</label>
          <input type="file" name="image" class="form-control" id="image">
     </div>

     <div><br>
           <button type="submit" class="btn btn-primary">Submit</button>
          <input type="reset" class="btn btn-secondary">
     </div>

</form>

@endsection