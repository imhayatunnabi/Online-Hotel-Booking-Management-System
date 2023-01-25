<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use Illuminate\Http\Request;

class AmenitiesController extends Controller
{
    public function list()
    {
        $amenity= Amenity::all();
        return view("backend.pages.amenities.list",compact('amenity'));
    }
    public function create()
    {
        return view("backend.pages.amenities.create");
    }
    public function store(Request $request)

    {
      
        Amenity::create([
            'name'=>$request->name,
            'status'=>$request->status,
        ]);
    
        return redirect()->back()->with('message','amenity added successfully.');
    }
    public function amenitydelete($amenityDelete)
    {
        
        Amenity::find($amenityDelete)->delete();
        return redirect()->back();
    } 
    public function amenityEdit($amenityEdit)
    {
        $amenity=Amenity::find($amenityEdit);
        return view('backend.pages.amenities.edit',compact('amenity'));
    }
    public function amenityUpdate(Request $request,$amenityUpdate)
    {
        
        $amenity=Amenity::find($amenityUpdate); 

        $amenity->update([
            'name'=>$request->name,  
            'status'=>$request->status,    
        ]);
        return redirect()->route('amenities');
    }
}
