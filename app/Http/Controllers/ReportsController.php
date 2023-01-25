<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ReportsController extends Controller
{
    public function list()
    {
        return view("backend.pages.reports");
    }
    
    public function reportSearch(Request $request)
    {
//        $request->validate([
//            'from_date'    => 'required|date',
//            'to_date'      => 'required|date|after:from_date',
//        ]);

        $validator = Validator::make($request->all(), [
            'from_date'    => 'required|date',
            'to_date'      => 'required|date|after:from_date',
        ]);

        if($validator->fails())
        {
//            notify()->error($validator->getMessageBag());
            Alert::warning('Opps !!', 'From_date should greater than To_date.');
            return redirect()->back();
        }
        // dd($validator);

       $from=$request->from_date;
       $to=$request->to_date;

//       $status=$request->status;

        $rooms=Booking::whereBetween('created_at', [$from, $to])->get();

        return view('backend.pages.reports',compact('rooms'));

    }
}
