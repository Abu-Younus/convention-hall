@extends('admin.master')

@section('title')
    Booking Invoice
@endsection

@section('body')
    @include('admin.navber')
    <div id="layoutSidenav">
        @include('admin.sidebar')
        <div class="container" style="margin-top: 80px; margin-left: 220px;">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-header">Booking Invoice
                        <div class="card-action">
                            <label><h6 class="text-warning">Find Convention Hall</h6></label>
                        </div>
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
                            <div class="col-md-6">
                                <address>
                                    <strong>Payment Method:</strong><br>
                                    {{ $payment->payment_type }}<br>
                                    {{ $customer->email }}
                                </address>
                            </div>
                            <div class="col-md-6 text-right">
                                <address>
                                    <strong>Booking Date:</strong><br>
                                    {{ $booking->created_at }}<br><br> 
                                </address>
                                
                            </div>
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
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center text-green"><strong>Advance : </strong></td>
                                    <td class="no-line text-right"> </td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center text-green"><strong>Due : </strong></td>
                                    <td class="no-line text-right"> </td>
                                </tr>
                                <hr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center text-warning"><strong>Signature : </strong></td>
                                    <td class="no-line text-right"></td>
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
