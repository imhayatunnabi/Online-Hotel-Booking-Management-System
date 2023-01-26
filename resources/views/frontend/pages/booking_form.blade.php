@extends('frontend.webside')

@section('content')

<head>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{url('/css/bootstrap.min.css')}}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{url('/css/style.css')}}">

</head>

<body>
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="booking-form">
                        <div class="booking-bg"></div>
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">{{$error}}</div>
                            @endforeach
                        @endif
                        <form method='post' action="{{route('booking.store',$room->id)}}">
                        @csrf
                            <div class="form-header">
                                <h2>Reserve your room</h2>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Check In</span>
                                        <input class="form-control" type="date" name="check_in" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Check Out</span>
                                        <input class="form-control" type="date" name="check_out" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="form-label">Name</span>
                                <input class="form-control" type="text" name="name" required placeholder="Enter your name">
                            </div>

                            <div class="form-group">
                                <span class="form-label">Email</span>
                                <input class="form-control" type="email" required name="email" placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                <span class="form-label">Address</span>
                                <input class="form-control" type="text" name="address" required placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <span class="form-label">Phone</span>
                                <input class="form-control" type="tel" name="contact" required placeholder="Enter your phone number">
                            </div>

                            <div class="form-btn">
                                <button type="submit" class="submit-btn">Book Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


@endsection
