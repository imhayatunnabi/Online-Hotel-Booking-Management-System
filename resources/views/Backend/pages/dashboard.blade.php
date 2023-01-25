@extends("master")

@section("content")

<h1>Admin/Dashboard</h1>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>

    <div class="w3-container">
        <div class="row">
            <div class="col-md-4">
                <div class="w3-panel w3-card w3-green">
                    <h1>Total Users :<br> <span>{{$totalUser}}</span> </h1>
                </div>
            </div>
            <div class="col-md-4">
                <div class="w3-panel w3-card-2 w3-yellow">
                    <h1>Total Rooms :<br> <span>{{$totalRooms}}</span> </h1>
                </div>
            </div>
            <div class="col-md-4">
                <div class="w3-panel w3-card-4 w3-blue">
                    <h1>Total Booking :<br> <span>{{$totalBookings}}</span> </h1>
                </div>
            </div>
        </div>
    </div>

</body>

@endsection