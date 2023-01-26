<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hotel::create([
            'Name'=>'Kodeeo Air BNB',
            'Address'=>'Uttara, Dhaka-1230, Bangladesh',
            'Email'=>'hotel@gmail.com',
            'Contact'=>'0123456789',
            'Website'=>'hotel.com',
        ]);
    }
}
