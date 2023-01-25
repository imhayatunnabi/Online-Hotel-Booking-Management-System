<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingDetails;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function list()
    {
        $rooms =Booking::with('roomRelation')->get();
        
        return view('backend.pages.booking',compact('rooms'));
    }
    public function bookingDetails($id)
    {   
        $rooms = BookingDetails::where("booking_id",$id)->get();
         

        return view('backend.pages.view',compact('rooms'));
    }


}
