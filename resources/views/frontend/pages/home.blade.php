@extends('frontend.webside')


@section('content')

@php
use RealRashid\SweetAlert\Facades\Alert;
if($errors->any()){
	foreach($errors->all() as $error){
		Alert::error('Error', $error);
	}
}
@endphp
<section class="home-slider owl-carousel">
	<div class="slider-item" style="background-image:url('/frontend/images/bg_1.jpg')">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-12 ftco-animate text-center">
					<div class="text mb-5 pb-3">
						<h1 class="mb-3">Welcome To Hotel Sea Palace</h1>
						<h2>Hotels &amp; Resorts</h2>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="slider-item" style="background-image:url('frontend/images/bg_2.jpg')">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-12 ftco-animate text-center">
					<div class="text mb-5 pb-3">
						<h1 class="mb-3">Enjoy A Luxury Experience</h1>
						<h2>Join With Us</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-booking">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<form action="{{route('CheckAvailability')}}" class="booking-form">
					<div class="row">
						<div class="col-md-4 d-flex">
							<div class="form-group p-4 align-self-stretch d-flex align-items-end">
								<div class="wrap">
									<label for="#">Check-in Date</label>
									<input type="text" class="form-control checkin_date" placeholder="Check-in date" name="check_in_date">
								</div>
							</div>
						</div>
						<div class="col-md-4 d-flex">
							<div class="form-group p-4 align-self-stretch d-flex align-items-end">
								<div class="wrap">
									<label for="#">Check-out Date</label>
									<input type="text" class="form-control checkout_date" placeholder="Check-out date" name="check_out_date">
								</div>
							</div>
						</div>
						<div class="col-md d-flex">
							<div class="form-group d-flex align-self-stretch">
							<input type="submit" value="Check Availability" class="btn btn-primary py-3 px-4 align-self-stretch">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<section class=" ftc-no-pb ftc-no-pt">
 
 <div class="arif_container">
	<div class="row">
		<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
				<div class="heading-section-wo-line pt-md-5 pl-md-5 mb-5">
					<div class="">
						<h2 class="">Welcome To Our Hotel</h2>
						 <span class="subheading">Welcome to Hotel Sea Palace</span>
					</div>
				</div>
				<div class="pb-md-5">
				<p>Standing around 6 acres of land, Hotel Sea Palace Limited the house for elites, ensures accommodation during your visit to make your experiences enjoyable & memorable.
				We assure  unique hospitality that our guests can have ensured recreation after sunbathing and swimming over the beach.
				Surrounded by screen beauty Hotel Sea Palace Limited is located at Kalatoli road 10 minutes driving -- distance from the airport & 200 yard away from Kalatoli Beach.</p>
				<p>During thè successful joumey of Hotel Sea Palace Ltd, it has build it’s business relation with different corporate houses of Bangladesh.
				Hotel Sea Palace Ltd has already been reputed as a pioneer hotel in Cox’s Bazaar to thè corporate clients of thè country. 
				Hotel’s state of thè art level and warm hospitality Services has made this hotel a unique place in thè MEEC (Meeting, Event, Exposition and Conference) industry in thè country.
				This hotel has been always responding fully to thè client’s leisure and business requirements.</p>
	           </div>
            </div>
		
		<div class="col-md-5 pb-md-5 img img-2 d-flex justify-content-center align-items-center ftco-animate">
			<ul>
				<h2>Our Services</h2>
				<li>Large Parking Area - 150 car at a time</li>
				<li>Own Security System with Metal Detector & CCTV.</li>
				<li>Own Power Supply System.</li>
				<li>Round the Clock Room Service</li>
				<li>Multimedia Projector Facility</li>
				<li>Internet Facility [WiFi]</li>
				<li>ISD Phone Facility</li>
				<li>Health Club</li>
				<li>Fully Equipt Gym</li>
				<li>Tour Guide</li>
				<li>Doctor on Call</li>
				<li>Airport Transfer</li>
				<li>Laundry Service</li>
				<li>Helipad</li>
				<li>Visa and Master Card</li>
				<li>Bus Ticket Booking</li>
			 </ul>
		</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<h2 class="mb-4">Our Rooms</h2>
			</div>
		</div>

		<div class="row">

			@foreach($rooms as $room)
			<div class="col-sm col-md-6 col-lg-4 ftco-animate">
				<div class="room">
					<div class="text p-3 text-center">
						<img src="{{url('/uploads/'.$room->room_image)}}" style="width:331px; height:auto;" alt="Room Image">
						<h3 class="mb-3"><a href="rooms.html">{{$room->name}}</a></h3>
						<p><span class="price mr-2">{{$room->amount}}</span> <span class="per">per night</span></p>
						<hr>
						<p class="pt-1">
							<a href="{{route('frontend.view.room',$room->id)}}" class="btn-custom">View Room Details <span class="icon-long-arrow-right"></span></a>
						</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>

<!-- <section class="instagram">
	<div class="container-fluid">
		<div class="row no-gutters justify-content-center pb-5">
			<div class="col-md-7 text-center heading-section ftco-animate">
				<h2><span>Instagram</span></h2>

			</div>
		</div>
		<div class="row no-gutters">
			<div class="col-sm-12 col-md ftco-animate">
				<a href="/frontend/images/image_5.jpg" class="insta-img image-popup" style="background-image: url('/frontend/images/image_5.jpg');">
					<div class="icon d-flex justify-content-center">
						<span class="icon-instagram align-self-center"></span>
					</div>
				</a>
			</div>
			<div class="col-sm-12 col-md ftco-animate">
				<a href="/frontend/images/image_6.jpg" class="insta-img image-popup" style="background-image: url('/frontend/images/image_6.jpg');">
					<div class="icon d-flex justify-content-center">
						<span class="icon-instagram align-self-center"></span>
					</div>
				</a>
			</div>
			<div class="col-sm-12 col-md ftco-animate">
				<a href="/frontend/images/image_8.jpg" class="insta-img image-popup" style="background-image: url('/frontend/images/image_8.jpg');">
					<div class="icon d-flex justify-content-center">
						<span class="icon-instagram align-self-center"></span>
					</div>
				</a>
			</div>
			<div class="col-sm-12 col-md ftco-animate">
				<a href="/frontend/images/insta-3.jpg" class="insta-img image-popup" style="background-image: url('/frontend/images/insta-3.jpg');">
					<div class="icon d-flex justify-content-center">
						<span class="icon-instagram align-self-center"></span>
					</div>
				</a>
			</div>
			<div class="col-sm-12 col-md ftco-animate">
				<a href="/frontend/images/insta-4.jpg" class="insta-img image-popup" style="background-image: url('/frontend/images/insta-4.jpg');">
					<div class="icon d-flex justify-content-center">
						<span class="icon-instagram align-self-center"></span>
					</div>
				</a>
			</div>
		</div>
	</div>
</section> -->

<section class="ftco-section contact-section bg-light">
  <div class="container">
    <div class="row d-flex mb-5 contact-info">
      <div class="col-md-12 mb-4">
        <h2 class="h3">Contact Information</h2>
      </div>

      <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
        <p><span>Address: </span> {{$hotel[0]->Address}}</p>
        </div>
      </div>

      <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
         <p><span>Email: </span> <a href="mailto:{{$hotel[0]->Email}}">{{$hotel[0]->Email}}</a></p>
        </div>
      </div>

      <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
         <p><span>Phone: <br></span> <a href="tel://{{$hotel[0]->Contact}}">{{$hotel[0]->Contact}}</a></p>
        </div>
      </div>

      <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
        <p><span>Website: <br></span> <a href="#">{{$hotel[0]->Website}}</a></p>
        </div>
      </div>
    </div>
    <div class="row block-9">
      <div class="col-md-6 order-md-last d-flex">

        <form action="{{route('guest.store')}}" method="post" class="bg-white p-5 contact-form">
          @csrf
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Your Name">
          </div>
          <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Your Email">
          </div>
          <div class="form-group">
            <input type="text" name="subject" class="form-control" placeholder="Subject">
          </div>
          <div class="form-group">
            <textarea name="massage" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
          </div>
        </form>

      </div>

      <div class="col-md-6 d-flex">
        <div id="map" class="bg-white"></div>
      </div>
    </div>
  </div>
</section>



@endsection