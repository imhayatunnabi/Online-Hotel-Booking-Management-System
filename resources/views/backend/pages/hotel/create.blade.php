@extends('master')

@section('content')
<h1>Add Hotel Information</h1>

@if(session()->has('message'))
<p class="alert alert-success">{{session()->get('message')}}</p>
@endif

<form method='post' action="{{route('hotel.store')}}">
     @csrf

    <div class= "form-group">
        <label for="address">Enter Address</label>
        <input type="text" name="address" class="form-control" id="price" required placeholder="Enter Address">
    </div>
    <div class= "form-group">
        <label for="email">Enter Email</label>
        <input type="email" name="email" class="form-control" id="price"required  placeholder="Enter Email">
    </div>
   
    <div class= "form-group">
        <label for="contact no">Enter Contact No</label>
        <input type="number" name="contact" class="form-control" id="price"required  placeholder="Enter Contact No">
    </div>
    <div class= "form-group">
        <label for="website">Enter Website</label>
        <input type="text" name="website" class="form-control" id="price"required  placeholder="Enter Website">
    </div>
   <div><br>
        <button type="submit" class="btn btn-primary">Submit</button>
             <td>
                <a href="{{route('admin.hotel.edit',$hotel[0]->id)}}" class="btn btn-primary">Edit<a>
            </td> 
   </div>
</form>
      
@endsection