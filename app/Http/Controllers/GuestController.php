<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GuestController extends Controller
{
    public function list()
    {   
      $guest = Guest::all();
        return view("backend.pages.guest.list", compact('guest'));
    }

    public function store(request $request)
    {
      //dd($request->all());
      Guest::create([
        //database column name => input field name
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'massage' => $request->massage
      ]);
      Alert::success('Massage','Your massage has been sent');
      return redirect()->back();
    }
}
