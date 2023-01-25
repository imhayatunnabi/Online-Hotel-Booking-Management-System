<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room_type;

class Room extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function roomType(){
        return $this->belongsTo(Room_type::class,'room_type_id','id');
    }

}
