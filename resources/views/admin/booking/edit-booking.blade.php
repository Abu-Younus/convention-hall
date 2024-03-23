@extends('admin.master')

@section('title')
    Edit Booking
@endsection

@section('body')
    @include('admin.navber')
    <div id="layoutSidenav">
        @include('admin.sidebar')
        <div class="container" style="margin-top: 80px; margin-left: 220px;">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-header text-primary"> Update Booking Form
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <strong>Billed To:</strong><br>
                                    {{ $customer->first_name.' '.$customer->last_name }}<br>
                                    {{ $customer->phone_number }}<br>
                                    {{ $customer->address }}
                                </address>
                            </div>
                            <div class="col-md-6 text-right">
                                <address>
                                    <strong>Shipped To:</strong><br>
                                    {{ $shipping->full_name }}<br>
                                    {{ $shipping->phone_number }}<br>
                                    {{ $shipping->city }},
                                    {{ $shipping->post_code }}<br>
                                    {{ $shipping->address }}
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            {{ Form::open(['url' => '/payment/update','method'=>'post','name'=>'editPaymentForm']) }}
                            <div class="col-md-6 pull-left">
                                <address>
                                    <strong>Payment Method:</strong><br>
                                    {{ $payment->payment_type }}<br>
                                    {{ $customer->email }}<br>
                                    <strong class="mt-2">Payment Status:</strong>
                                    <input type="hidden" class="form-control form-control-rounded" style="width: 180px;" name="payment_id" value="{{$payment->id}}" />
                                    <select class="form-control form-control-rounded mt-2" style="width: 180px" id="input-5" name="payment_status">
                                        <option value="{{ $payment->payment_status }}"> {{ $payment->payment_status }} </option>
                                        <option value="Completed">Completed</option>
                                        <option value="Pending">Pending</option>
                                    </select>
                                    <button type="submit" name="btn" id="btnUpdate" class="btn btn-success btn-round btn-sm px-4 mt-2"><i class="icon-lock"></i> Update</button>
                                </address>
                            </div>
                            {{ Form::close() }}
                            {{ Form::open(['url' => '/booking/update','method'=>'post','name'=>'editBookingForm']) }}
                            <div class="col-md-6 pull-right">
                                <address class="text-right">
                                    <strong>Booking Date:</strong><br>
                                    {{ $booking->created_at }}<br>
                                    <strong class="mt-2">Booking Status:</strong><br>
                                    <input type="hidden" class="form-control form-control-rounded" style="width: 180px;" name="booking_id" value="{{$booking->id}}" />
                                    <select class="form-control form-control-rounded mt-2" style="width: 180px" id="input-5" name="booking_status">
                                        <option value="{{ $booking->order_status }}">{{ $booking->order_status }}</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Pending">Pending</option>
                                    </select>
                                    <button type="submit" name="btn" id="btnUpdate" class="btn btn-success btn-round btn-sm px-4 mt-2"><i class="icon-lock"></i> Update</button>
                                </address>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <td><strong>Item</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center"><strong>Booking Days</strong></td>
                                    <td class="text-center"><strong>Shift</strong></td>
                                    <td class="text-right"><strong>Total Price</strong></td>
                                </tr>
                                </thead>
                                <tbody>
                                @php($sum = 0)
                                @foreach($orderDetails as $orderDetail)
                                    <tr>
                                        <td>{{ $orderDetail->hall_name }}</td>
                                        <td class="text-center">TK. {{ $orderDetail->hall_price }}</td>
                                        <td class="text-center">{{ $orderDetail->booking_days }}</td>
                                        <td class="text-center">{{ $orderDetail->hall_shift }}</td>
                                        <td class="text-right">TK. {{ $total = $orderDetail->hall_price * $orderDetail->booking_days }}</td>
                                    </tr>
                                    <?php $sum = $sum + $total ?>
                                @endforeach()
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right">TK. {{ $sum }}</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Vat</strong></td>
                                    <td class="no-line text-right">TK. {{ $vat = ($sum*3)/100 }}</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right">TK. {{ $sum + $vat }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--start overlay-->
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->
        </div>
    </div>
    </div>
@endsection
