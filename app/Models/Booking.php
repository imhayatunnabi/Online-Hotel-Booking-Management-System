<?php

namespace App\Models;

use App\Models\Room;
use App\Models\BookingDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function bookingDetails(){
        return $this->hasMany(BookingDetails::class,'id','booking_id');
    }
    public function roomRelation(){
       return  $this->belongsTo(Room::class,'room_id','id');
    }

}
