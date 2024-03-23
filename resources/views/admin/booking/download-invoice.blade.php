<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="bg-dark">
                <h4 class="text-center text-light">Booking Invoice ({{$customer->first_name.' '.$customer->last_name}})</h4>
            </div>
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
                        {{ $booking->created_at }}
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><strong>Booking summary</strong></h4>
                        </div>
                        <div class="panel-body">
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
                                            <td class="text-center text-dark">TK. {{ $orderDetail->hall_price }}</td>
                                            <td class="text-center">{{ $orderDetail->booking_days }}</td>
                                            <td class="text-center">{{ $orderDetail->hall_shift }}</td>
                                            <td class="text-right text-dark">TK. {{ $total = $orderDetail->hall_price * $orderDetail->booking_days }}</td>
                                        </tr>
                                        <?php $sum = $sum + $total ?>
                                    @endforeach()
                                    <tr>
                                        <td class="thick-line"></td>
                                        <td class="thick-line"></td>
                                        <td class="thick-line"></td>
                                        <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                        <td class="thick-line text-right text-dark">TK. {{ $sum }}</td>
                                    </tr>
                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line text-center"><strong>Vat</strong></td>
                                        <td class="no-line text-right text-dark">TK. {{ $vat = ($sum*3)/100 }}</td>
                                    </tr>
                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line text-center"><strong>Total</strong></td>
                                        <td class="no-line text-right text-dark">TK. {{ $sum + $vat }}</td>
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
                                    <td class="no-line text-right"></td>
                                </tr>

                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line text-center text-dark"><strong>Signature : </strong></td>
                                        <td class="no-line text-right text-danger"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
