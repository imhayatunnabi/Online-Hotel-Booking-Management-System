<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function home()
    {
        $totalUser = User::count();
        $totalBookings = Booking::count();
        $totalRooms = Room::count();
        return view("Backend.pages.dashboard",compact('totalUser','totalBookings','totalRooms'));
    }

}
