@extends('frontend.webside')

@section('content')

<section>
  <div class="hero-wrap" style="background-image: url('/frontend/images/bg_1.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{route('website')}}">Home</a></span> <span>Rooms</span></p>
	            <h2 class="mb-4 bread">Our Rooms</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<section>
	<div class="row">
		@foreach($rooms as $room)
		 <div class="col-sm col-md-6 col-lg-4 ftco-animate">	
					<div class="room">
						<div class="icon d-flex justify-content-center align-items-center"></div>

					     <div class="text p-3 text-center">
							<img src="{{url('/uploads/'.$room->room_image)}}" style="width:331px; height:auto;" alt="Room Image">
							<h3 class="mb-3"><a href="rooms.html">{{$room->name}}</a></h3>
							<p><span class="price mr-2">{{$room->amount}}</span> <span class="per">per night</span></p>
							<hr>
							<p class="pt-1"> <a href="{{route('frontend.view.room',$room->id)}}" class="btn-custom">View Room Details <span class="icon-long-arrow-right"></span></a></p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>

@endsection