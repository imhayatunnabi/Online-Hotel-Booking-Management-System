<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function Home()
    {
        $hotel=Hotel::all();
        return view("backend.pages.hotel.create",compact('hotel'));
    }

    public function store(Request $request)
    {
        Hotel::create([
            'Name'=>$request->name,
            'Email'=>$request->email,
            'Address'=>$request->address,
            'Contact'=>$request->contact,
            'Website'=>$request->website,

        ]);
        return redirect()->back()->with('message','Information added successfully.');
    }

    public function hotelEdit($hotelEdit)
    {
        $hotel=Hotel::find($hotelEdit);
        return view('backend.pages.hotel.edit',compact('hotel'));
    }
    public function hotelUpdate(Request $request,$hotelUpdate)
    {

        $hotel=Hotel::find($hotelUpdate);
        $hotel->update([
            'Name'=>$request->name,
            'Email'=>$request->email,
            'Address'=>$request->address,
            'Contact'=>$request->contact,
            'Website'=>$request->website,
        ]);
        return redirect()->route('hotel')->with('message','Update successfull.');

    }

}