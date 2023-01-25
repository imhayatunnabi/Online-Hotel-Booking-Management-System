<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingDetails;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function list()
    {
        $payment= Booking::all();
        return view("backend.pages.payment",compact('payment'));
    }
}
