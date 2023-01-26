@extends('master')

@section('content')

<h1>Hotel Info Update</h1>

@if(session()->has('message'))
<p class="alert alert-success">{{session()->get('message')}}</p>
@endif

<form method='post' action="{{route('admin.hotel.update',$hotel->id)}}">
    @method('put')
     @csrf
   
    <div class= "form-group">
        <label for="address">Enter Address</label>
        <input type="text" name="address"value="{{$hotel->Address}}" class="form-control" id="price" placeholder="Enter Address">
    </div>
    <div class= "form-group">
        <label for="email">Enter Email</label>
        <input type="email" name="email" value="{{$hotel->Email}}"class="form-control" id="price" placeholder="Enter Email">
    </div>

    <div class= "form-group">
        <label for="contact no">Enter Contact No</label>
        <input type="number" name="contact"value="{{$hotel->Contact}}" class="form-control" id="price" placeholder="Enter Contact No">
    </div>
    <div class= "form-group">
        <label for="website">Enter Website</label>
        <input type="text" name="website"value="{{$hotel->Website}}" class="form-control" id="price" placeholder="Enter City">
    </div><br>
   <div>
        <button type="submit" class="btn btn-primary">Update</button>
        <input type="reset" class="btn btn-secondary">
   </div>

</form>




@endsection