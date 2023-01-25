@extends('master')

@section('content')

<h1>Reports- {{date('d-m-Y')}}</h1>

<form action="{{route('booking.report.search')}}" method="get">
<div class="row">
    <div class="col-md-4">
        <label for="">From date:</label>
        <input name="from_date" type="date" class="form-control">

    </div>
    <div class="col-md-4">
        <label for="">To date:</label>
        <input name="to_date" type="date" class="form-control">
    </div>
    <div class="col-md-4"> <br>
   <button type="submit" class="btn btn-success">Search</button>
    </div>
</div>
</form><br>

<div id="bookingReport">

<!-- <h1>Reports- {{date('d-m-Y')}}</h1> -->

    <table class="table table-striped">
        <thead>
        <tr>
            <!-- <th scope="col">Id</th> -->
            <th scope="col">User_id</th>
            <th scope="col">User_Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Contact No</th>
            <th scope="col">Room_Name</th>
            <th scope="col">Total Amount</th>
            <th scope="col">Paid Amount</th>
            <th scope="col">Booking Date</th>
            <!-- <th scope="col">No of Guest</th> -->
            <!-- <th scope="col">Check In Date</th> -->
            <!-- <th scope="col">Check Out Date</th> -->
        </tr>
        </thead>

        <tbody>
        @if(isset($rooms))
        @foreach($rooms as $data)
        <tr>
            <!-- <td>{{$data->id}}</td> -->
            <td>{{$data->user_id}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->address}}</td>
            <td>{{$data->contact}}</td>
            <td>{{$data->roomRelation->name}}</td>
            <td>{{$data->total_amount*$data->days}}</td>
            <td>{{$data->total_amount}}</td>
            <td>{{$data->created_at}}</td>
            <!-- <td>{{$data->no_of_guest}}</td> -->
            <!-- <td>{{$data->check_in_date}}</td> -->
            <!-- <td>{{$data->check_out_date}}</td> -->

        </tr>
        @endforeach
        @endif
        </tbody>
    </table>
</div>
<button onclick="printDiv('bookingReport')" class="btn btn-success">Print</button>


<script>
    function printDiv(divId){
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

@endsection