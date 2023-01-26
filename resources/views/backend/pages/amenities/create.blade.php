@extends('master')

@section('content')
<h1>Amenities</h1>

<form method='post' action="{{route('amenities.store')}}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="name">Amenities Name</label>
        <select name="name" id="" class="form-control">
            <option value="free-breakfast">Free breakfast</option>
            <option value="airport-drop & pick-up">Airport Drop & Pick-up</option>
        </select>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="" class="form-control">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <input type="reset" class="btn btn-secondary">
    </div>

</form>




@endsection