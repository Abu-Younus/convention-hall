<!doctype>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Orders Mail | Find Convention Hall</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body class="text-center bg-dark text-light">
<div class="container" style="margin-top: 10px;">
    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">Hi <span class="text-primary">{{Session::get('customerName')}}</span>
                <div class="card-action">
                    <label><h5 class="text-primary">Thanks for browse and booking our community. </h5></label>
                </div>
                <div class="card-action">
                    <label><h3 class="text-danger">Your Booking Details</h3></label>
                </div><hr>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <address>
                            <strong>Billed To:</strong><br>
                            {{Session::get('customerName')}}<br>
                            {{Session::get('customerNumber')}}<br>
                            {{Session::get('customerAddress')}}
                        </address>
                    </div><br>
                    <div class="col-md-6 text-right">
                        <address>
                            <strong>Shipped To: </strong><br>
                            {{Session::get('shippingName')}}<br>
                            {{Session::get('shippingNumber')}}<br>
                            {{Session::get('shippingCity')}},
                            {{Session::get('shippingPostCode')}}<br>
                            {{Session::get('shippingAddress')}}
                        </address>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-6">
                        <address>
                            <strong>Payment Method : </strong>
                            {{ Session::get('paymentType') }}<br>
                            <strong>Customer Email : </strong>
                            {{Session::get('customerEmail')}}
                        </address>
                    </div><br>
                    <div class="col-md-6 text-right">
                        <address>
                            <strong>Booking Date : </strong>
                            {{ Session::get('bookingDate') }}<br>
                        </address>
                    </div>
                </div>
            </div><br>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-condensed text-center">
                        <thead>
                        <tr>
                            <td><strong>Item</strong></td>
                            <td class="text-center"><strong>Price</strong></td>
                            <td class="text-center"><strong>Booking Days</strong></td>
                            <td class="text-right"><strong>Total Price</strong></td>
                        </tr>
                        </thead>
                        <tbody>
                        @php($sum = 0)
                        <?php $cartHalls = Cart::Content(); ?>
                        @foreach($cartHalls as $cartHall)
                            <tr>
                                <td>{{ $cartHall->name }}</td>
                                <td class="text-center">TK. {{ $cartHall->price }}</td>
                                <td class="text-center">{{ $cartHall->qty }}</td>
                                <td class="text-right">TK. {{ $total = $cartHall->price * $cartHall->qty }}</td>
                            </tr>
                            <?php $sum = $sum + $total ?>
                        @endforeach
                        <br><tr>
                            <td class="thick-line"></td>
                            <td class="thick-line"></td>
                            <td class="thick-line text-center"><strong>Subtotal</strong></td>
                            <td class="thick-line text-right">TK. {{ $sum }}</td>
                        </tr>
                        <tr>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line text-center"><strong>Vat</strong></td>
                            <td class="no-line text-right">TK. {{ $vat = ($sum*3)/100 }}</td>
                        </tr>
                        <tr>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line text-center"><strong>Total</strong></td>
                            <td class="no-line text-right">TK. {{ $sum + $vat }}</td>
                        </tr>
                        </tbody>
                    </table><hr>
                    <h4 class="text-success">Thanks By.......<br>
                        <span class="text-danger">Find Convention Hall Team</span>
                    </h4><br>
                </div>
            </div>
        </div>
    </div>
    <!--start overlay-->
    <div class="overlay toggle-menu"></div>
    <!--end overlay-->
</div>
</div>
</body>
</html>

