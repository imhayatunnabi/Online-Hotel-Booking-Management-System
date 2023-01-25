<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingDetails extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function booking(){
        $this->belongsTo(Booking::class,'booking_id','id');
    }
}
