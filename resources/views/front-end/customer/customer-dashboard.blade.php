@extends('front-end.master')

@section('title')

    Customer Dashboard | Find Convention Hall

@endsection()

@section('body')
    <!-- Single Page -->
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <div class="checkout-right">
                <div class="row">
                    <div class="row">
                        <div class="col-md-11 col-md-offset-1">
                            <a href="/customer/profile/{{Session::get('customerId')}}/{{Session::get('customerName')}}" class="btn btn-warning pull-right">Profile</a>
                        </div>
                    </div>
                </div>
                <h3 class="text-center text-primary"> My Orders </h3><hr>
                <h3 class="text-center text-danger">{{Session::get('message')}}</h3><br>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Order ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Order Status</th>
                            <th>Payment Type</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($bookingInfos as $bookingInfo)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{$bookingInfo->order_id}}</td>
                                <td>{{ $bookingInfo->hall_name }}</td>
                                <td><img src="{{ asset($bookingInfo->hall_image) }}" alt="" width="80px" height="80px" /></td>
                                <td>Tk. {{ $bookingInfo->hall_price }}</td>
                                <td>{{ $bookingInfo->booking_days }}</td>
                                <td>Tk. {{ $bookingInfo->hall_price * $bookingInfo->booking_days }}</td>

                                @if($bookingInfo->order_status == 'Cancelled')
                                    <td><h5 class="text-danger">{{ $bookingInfo->order_status }}</h5></td>
                                @else
                                    <td><h5 class="text-black">{{ $bookingInfo->order_status }}</h5></td>
                                @endif

                                <td>{{ $bookingInfo->payment_type }}</td>

                                @if($bookingInfo->payment_status == 'Cancelled')
                                    <td><h5 class="text-danger">{{ $bookingInfo->payment_status }}</h5></td>
                                @else
                                    <td><h5 class="text-black">{{ $bookingInfo->payment_status }}</h5></td>
                                @endif
                                <td>
                                    <a href="/booking/cancelled/{{$bookingInfo->order_id}}" class="btn btn-danger btn-xs" title="Cancelled">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection()
