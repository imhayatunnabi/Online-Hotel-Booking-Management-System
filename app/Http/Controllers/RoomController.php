<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingDetails;
use App\Models\Room;
use App\Models\Room_type;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function vip()
    { 
        $room=Room::paginate(5);
        return view("backend.pages.rooms.list",compact('room'));
    }
    public function createform()
    {
        $roomType = Room_type::all();
        return view('backend.pages.rooms.create',compact('roomType'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'room_name'=>'required',
            'image'=>'required | mimes:jpg,png,jpeg,gif',
            'room_no'=>'required | min:1 |numeric:rooms',
            'name'=>'required',
            'amount'=>'required | min:1 |numeric:rooms',
            'accomodate'=>'required | min:1 |numeric:rooms',
            'bed'=>'required | min:1 |numeric:rooms',
        ]);

        $fileName=null;
        if($request->hasFile('image'))
        {
            // dd("true");
            // generate name
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        } 
        Room::create([
            'room_image'=>$fileName,
            'room_type_id'=>$request->room_type_id,
            'name'=>$request->room_name,
            'room_no'=>$request->room_no,
            'type'=>$request->name,
            'amount'=>$request->amount,
            'no_of_accomodate'=>$request->accomodate,
            'bed'=>$request->bed,
        ]);
        return redirect()->back()->with('message','Room added successfully.');
    }
    public function roomdelete($roomDelete)
    {
        
        Room::find($roomDelete)->delete();
        return redirect()->back()->with('message','room deleted successfully.');
        
    }
    public function roomEdit($roomEdit)
    {
        $room=Room::find($roomEdit);
        return view('backend.pages.rooms.edit',compact('room'));
    }
    public function Update(Request $request,$roomUpdate)
    {
        
        $room=Room::find($roomUpdate); 
    
        $room->update([
         
            'name'=>$request->room_name,
            'room_no'=>$request->room_no,
            'type'=>$request->name,
            'amount'=>$request->amount,
            'no_of_accomodate'=>$request->accomodation,  
            'bed'=>$request->bed,  
        ]);
        return redirect()->route('rooms')->with('message','Update successfull.');

    }
    public function roomView($roomView)
    {
        $room=Room::find($roomView);
        return view('backend.pages.rooms.view',compact('room'));
    }
    public function search(Request $req)
    { 

        $req->validate(([
          
            "check_in_date"=>"date|after_or_equal:now",
            "check_out"=>"date|after:check_in",
    
          ]));
        // dd($req->check_in_date);
        $newDate = Carbon::createFromFormat('m/d/Y',$req->check_in_date)->format('Y-m-d');

        $bookings=BookingDetails::whereDate("check_in_date",$newDate)->pluck("room_id")->toArray();
        $rooms = Room::whereNotIn("id",$bookings)->get();
        return view("frontend.pages.available_room",compact('rooms'));
    }
}

