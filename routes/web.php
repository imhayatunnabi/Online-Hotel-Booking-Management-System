<?php

use App\Http\Controllers\Hotel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\AmenitiesController;

use App\Http\Controllers\Room_typeController;
use App\Http\Controllers\frontend\StatusController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\frontend\LandingpageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// SSLCOMMERZ Start

Route::post('/pay/{id}', [SslCommerzPaymentController::class, 'index'])->name('pay.now');
Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
//SSLCOMMERZ END




//route for frontend
Route::get('/',[LandingpageController::class,'home'])->name('website');
Route::get('/all-rooms',[LandingpageController::class,'allrooms'])->name('website.rooms');
Route::get('/about',[LandingpageController::class,'about'])->name('website.about');
Route::get('/contact',[LandingpageController::class,'contact'])->name('website.contact');
Route::post('/registration',[LandingpageController::class,'signup'])->name('user.registration');
Route::post('/login',[LandingpageController::class,'login'])->name('user.login');
Route::get('/user/logout',[LandingpageController::class,'logout'])->name('user.logout');
Route::get('/user/profile',[LandingpageController::class,'profile'])->name('user.profile');
Route::put('/user/profile/update',[LandingpageController::class,'updateProfile'])->name('user.profile.update');

Route::get('/single-room/view/{roomView}',[LandingpageController::class,'roomView'])->name('frontend.view.room');
Route::get('/booking-form/{room_id}',[LandingpageController::class,'viewBookingForm'])->name('booking.form');
Route::post('/booking_data/store/{room_id}',[LandingpageController::class,'store'])->name('booking.store');

Route::get('/approved/{booking_approved}',[StatusController::class,'approved'])->name('approved');
Route::get('/disapproved/{booking_disapproved}',[StatusController::class,'disapproved'])->name('disapproved');

Route::get('/search',[RoomController::class,'search'])->name('CheckAvailability');
Route::get('/room/view/{roomView}',[RoomController::class,'roomView'])->name('room.view');
Route::post('/guest/store',[GuestController::class,'store'])->name('guest.store');







//route for backend

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/do-login',[UserController::class,'doLogin'])->name('do.login');


Route::group(['middleware'=>['auth','CheckAdmin'],'prefix'=>'admin'],function (){
    

Route::get('/user',[UserController::class,'list'])->name('user');   
Route::get('/logout',[UserController::class,'logout'])->name('logout');
Route::get('/panel',[AdminController::class,'home'])->name('dashboard');
Route::get('/',[MasterController::class,'home'])->name('admin');

Route::get('/hotel',[HotelController::class,'Home'])->name('hotel');
Route::post('/hotel/store',[HotelController::class,'store'])->name('hotel.store');
Route::get('/hotel/edit/{hotelEdit}',[HotelController::class,'hotelEdit'])->name('admin.hotel.edit');
Route::put('/hotel/edit/{hotelUpdate}',[HotelController::class,'hotelUpdate'])->name('admin.hotel.update');


Route::get('/room_type',[Room_typeController::class,'list'])->name('room_type');
Route::get('/roomtype/Details',[Room_typeController::class,'CreateForm'])->name('room_type.Details');
Route::post('/roomtype/store',[Room_typeController::class,'store'])->name('room_type.store');
Route::get('/room_type/delete/{roomDelete}',[Room_typeController::class,'roomdelete'])->name('admin.room.delete');
Route::get('/room_type/view/{roomView}',[Room_typeController::class,'roomView'])->name('admin.room.view');
Route::get('/room_type/edit/{roomEdit}',[Room_typeController::class,'roomEdit'])->name('admin.room.edit');
Route::put('/room_type/edit/{roomUpdate}',[Room_typeController::class,'Update'])->name('admin.room.update');

Route::get('/rooms',[RoomController::class,'vip'])->name('rooms');
Route::get('/rooms/create',[RoomController::class,'createform'])->name('rooms.create');
Route::post('/room/store',[RoomController::class,'store'])->name('room.store');
Route::get('/room/delete/{roomDelete}',[RoomController::class,'roomdelete'])->name('room.delete');
Route::get('/room/edit/{roomEdit}',[RoomController::class,'roomEdit'])->name('room.edit');
Route::put('/room/edit/{roomUpdate}',[RoomController::class,'Update'])->name('room.update');

Route::get('/booking',[BookingController::class,'list'])->name('booking');
Route::get('/booking/{bookingDetails}',[BookingController::class,'bookingDetails'])->name('booking.details');

Route::get('/amenities',[AmenitiesController::class,'list'])->name('amenities');
Route::get('/amenities/create',[AmenitiesController::class,'create'])->name('amenities.create');
Route::post('/amenities/store',[AmenitiesController::class,'store'])->name('amenities.store');
Route::get('/amenity/delete/{amenityDelete}',[AmenitiesController::class,'amenitydelete'])->name('amenity.delete');
Route::get('/amenity/edit/{amenityEdit}',[AmenitiesController::class,'amenityEdit'])->name('admin.amenity.edit');
Route::put('/amenity/edit/{amenityUpdate}',[AmenitiesController::class,'amenityUpdate'])->name('admin.amenity.update');

Route::get('/payment',[PaymentController::class,'list'])->name('payment');

Route::get('/reports',[ReportsController::class,'list'])->name('reports');
Route::get('/report/search',[ReportsController::class,'reportSearch'])->name('booking.report.search');
Route::get('/guest',[GuestController::class,'list'])->name('guest');

});