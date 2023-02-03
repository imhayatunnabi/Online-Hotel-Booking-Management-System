@extends('frontend.webside')
@section('content')

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
            </div>
        </div>
        <div class="row">
            @foreach($rooms as $room)
            <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                <div class="room">
                    <h2>Single room view</h2>
                    <div class="text p-3 text-center">
                        <img src="{{url('/uploads/'.$room->room_image)}}" style="width:331px; height:auto;"
                            alt="Room Image">
                        <h3 class="mb-3"><a href="rooms.html">{{$room->name}}</a></h3>
                        <p><span class="price mr-2">{{$room->amount}}</span> <span class="per">per night</span></p>
                        <ul class="list">
                            <li><span>Room No: </span>{{$room->room_no}}</li>
                            <li><span>Room Type: </span>{{$room->type}}</li>
                            <li><span>Max: </span>{{$room->no_of_accomodate}} Person</li>
                            <li><span>Size: </span> 45 m2</li>
                            <li><span>View: </span> Sea View</li>
                            <li><span>Bed: </span>{{$room->bed}}</li>
                        </ul>
                        <hr>
                        <p class="pt-1"><a href="{{route('booking.form',$room->id)}}" class="btn-custom">Book Now<span
                                    class="icon-long-arrow-right"></span></a></p>
                        <p class="pt-1"><a href="{{route('pay.now.form',$room->id)}}" class="btn-custom">Pay Now
                                Online<span class="icon-long-arrow-right"></span></a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endsection
