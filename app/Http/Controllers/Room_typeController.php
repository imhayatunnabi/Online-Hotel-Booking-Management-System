<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Room_type;
use Illuminate\Http\Request;

class Room_typeController extends Controller
{
    public function list()
    {
        $room_types=Room_type::paginate(5);
        return view('backend.pages.room_types.list', compact('room_types'));
    }
    public function CreateForm()
    {
        return view('backend.pages.room_types.create');
    }
    public function store(Request $request)

    {

        $request->validate([
            'room_name'=>'required',
            'amount'=>'required | min:1 |numeric:room_types',
            'image'=>'required | mimes:jpg,png,jpeg,gif',
        ]);
        $fileName=null;
        if($request->hasFile('image'))
        {
            // dd("true");
            // generate name
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        } 
        Room_type::create([
            'room_image'=>$fileName,
            'name'=>$request->room_name,
            'amount'=>$request->amount,
        ]);
    
        return redirect()->back()->with('message','Room_type added successfully.');
    }
    
    public function roomdelete($roomDelete)

    {
        
        Room_type::find($roomDelete)->delete();
        return redirect()->back()->with('message','room deleted successfully.');
        
        // {$test=Room_type::find($roomDelete);
        //      if($test){
        //      $test->delete();
        //      return redirect()->back()->with('message','product deleted successfully.');
        //      } else{ return redirect()->back()->with('error','product not found.');
        //      }}
    }

    public function roomView($roomView)
    {
        
        $rooms=Room::where('room_type_id',$roomView)->get();
        return view('backend.pages.room_types.view',compact('rooms'));
    }

    public function roomEdit($roomEdit)
    {
        $room=Room_type::find($roomEdit);
        return view('backend.pages.room_types.edit',compact('room'));
    }
    public function update(Request $request,$roomUpdate)
    {
        $request->validate([
            'image'=>'required | mimes:jpg,png,jpeg,gif']);
            
        $room=Room_type::find($roomUpdate); 
        $fileName=$room->image;

        if($request->hasFile('image'))
        {
            // dd("true");
            // generate name
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        } 
        $room->update([
            'room_image'=>$fileName,
            'name'=>$request->room_name,
            'amount'=>$request->amount,
        ]);
        return redirect()->route('room_type')->with('message','Update successfull.');

    }
}