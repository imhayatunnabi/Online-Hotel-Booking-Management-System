<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Models\BookingDetails;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Library\SslCommerz\SslCommerzNotification;

class SslCommerzPaymentController extends Controller
{

    public function exampleEasyCheckout()
    {
        return view('exampleEasycheckout');
    }

    public function exampleHostedCheckout()
    {
        return view('exampleHosted');
    }

    public function index(Request $request,$id)
    {

        $room= Room::find($id);
        $post_data = array();
        $post_data['total_amount'] = $room->amount; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $request->name;
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $request->contact;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";
       $request->validate([
            "check_in"=>"date|after_or_equal:now",
            "check_out"=>"date|after:check_in",
        ]);
        $room = Room::find($id);
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
                'total_amount'=>$post_data['total_amount']
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

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }
    public function success(Request $request)
    {
        echo "Transaction is Successful";

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.

    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');
    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');
    }
}