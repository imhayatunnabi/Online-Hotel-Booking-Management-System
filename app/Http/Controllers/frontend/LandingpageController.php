<?php

namespace App\Http\Controllers\frontend;

use App\Models\Room;
use App\Models\User;
use App\Models\Guest;
use App\Models\Hotel;
use App\Models\Booking;
use Carbon\CarbonPeriod;
use App\Models\Room_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\BookingDetails;
use RealRashid\SweetAlert\Facades\Alert;

class LandingpageController extends Controller
{
  public function home()
  {
    $rooms=Room_type::all();
    $contact=Guest::all();
    $hotel=Hotel::all();
    // dd($rooms);
    return view('frontend.pages.home',compact('rooms','contact',('hotel')));
  }

  public function allrooms()
  {
      $rooms=Room_type::all();
      return view('frontend.pages.rooms_view',compact('rooms'));
  }

  public function about()
  {
    $rooms=Room_type::all();
    return view('frontend.pages.about',compact('rooms'));
  }

  public function contact()
  {
    $rooms=Room_type::all();
    $contact=Guest::all();
    $hotel=Hotel::first();
    // dd($hotel);
    return view('frontend.pages.contact',compact('rooms','contact','hotel'));
  }

  public function signup(request $request)
  {
    // dd($request->all());

    $request->validate([
      "name" => "required",
      "email" => "required|email",
      "password" => "required",
      "contact" => "required",
      "gender" => "required",
    ]);
    User::create([
      //database column name => input field name
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
      'contact' => $request->contact,
      'address' => $request->address,
      'gender' => $request->gender,
      'role' => 'user'
    ]);
    Alert::success('Signup','Your Registration Successfull');
    return redirect()->back();
  }

  public function login(request $request)
  {
    $request->validate([
      "email" => "required|email",
      "password" => "required",
    ]);
    //    dd($request->all());
    $credentials = $request->except('_token');
    //    dd($credentials);
    if (auth()->attempt($credentials)) {

      Alert::success('Login', "Login Successful");
      return redirect()->route("website");
    }
      Alert::error('Error', "Credentials is Not Match");
    return redirect()->route("website");
  }

  public function logout()
  {
    auth()->logout();
    Alert::success('Logout', 'Logout Successful');
    return redirect()->back();
  }

  public function roomView($roomView)
    {
        $rooms=Room_type::find($roomView);
        $rooms=Room::where('room_type_id',$rooms->id)->get();
        $room=Room_type::find($roomView);
        return view('frontend.pages.single_view',compact('room','rooms'));
    }
    public function viewBookingForm($room_id)
    {
      if(auth()->user()){

       $room=Room_type::find($room_id);
       $room=Room::find($room_id);
        return view('frontend.pages.booking_form',compact('room'));
      }
      else
       {  Alert::warning('You are not authenticate','Do registration & Login');
          return redirect()->route('website');
        }
    }
    public function store(Request $request,$room_id)
    {

        $request->validate([
            "check_in"=>"date|after_or_equal:now",
            "check_out"=>"date|after:check_in",
        ]);
        $room = Room::find($room_id);
        $fromDate=$request->check_in;
        $toDate=$request->check_out;
        $roomAvailability = BookingDetails::where('room_id',$room->id)
                            ->whereBetween('check_in_date',[$fromDate,$toDate])
                            ->pluck('check_in_date');
        $period = CarbonPeriod::create($fromDate, $toDate);
        $totalDays = count($period);
        $booking = null;
        foreach ($period as $key=> $date) {
          foreach($roomAvailability as $availableRoom){
            // $dateToFormateYHD =
                if($availableRoom = date('Y-m-d',strtotime($date))){
                  Alert::error('Opps !!', 'Room Not Available on this day');
                  return redirect()->route('website.rooms');
                }
          }

          if($key == 0 ){
            $booking =  Booking::create([
                'user_id'=>auth()->user()->id,
                'room_id'=>$room->id,
                'name'=>$request->name,
                'email'=>$request->email,
                'address'=>$request->address,
                'contact'=>$request->contact,
                "days"=>$totalDays,
                'total_amount'=>$room->amount
            ]);
          }

        BookingDetails::create([
            'booking_id'=>$booking->id,
            'user_id'=>auth()->user()->id,
            'room_id'=>$room->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'contact'=>$request->contact,
            'check_in_date'=>$date,
        ]);
        }
    Alert::success('Booking', 'Booking Successful');
    return redirect()->route('website.rooms');
  }

  public function profile()
  {
    $booking = Booking::where('user_id',auth()->user()->id)->get();
    // dd($booking);
    return view("frontend.pages.profile",compact('booking'));
  }
  public function updateProfile(Request $request)
  {
     //validation

      $user=User::find(auth()->user()->id);
      $user->update([
         'name'=>$request->user_name,
         'address'=>$request->user_address,
         'contact'=>$request->contact,
      ]);
      Alert::success('Profile','User profile updated.');
      return redirect()->route('website');
  }

}