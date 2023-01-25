<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function approved($booking_approved)
    {
        $booking = Booking::find($booking_approved)->update([
                'status'=>'Booked'
            ]);
            return back();
    }
    public function disapproved($booking_disapproved)
    {
        $booking = Booking::find($booking_disapproved)->update([
            'status'=>'Cancel'
        ]);
        return back();
    }
}
