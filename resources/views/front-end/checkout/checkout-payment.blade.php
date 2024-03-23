@extends('front-end.master')

@section('title')

    Payment Info | Find Convention Hall

@endsection()

@section('body')
    <!-- Single Page -->
    <div class="banner_bottom_agile_info">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <h3 class="text-center">Dear <span class="text-success">{{ Session::get('customerName') }}</span>
                    <p class="text-danger"><br>You have to give us Hall Booking payment method.</p>
                </h3>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <br>
                <table class="table table-bordered">
                    {{ Form::open(['url'=>'new/order', 'method'=>'POST']) }}

                    <tr>
                        <th>Cash On Delivery</th>
                        <td><input type="radio" name="payment_type" value="cash"/> Cash On Delivery </td>
                    </tr>
                    <tr>
                        <th>SSL Commerz</th>
                        <td><input type="radio" name="payment_type" value="ssl_commerz"/> SSL Commerz </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><input type="submit" class="btn btn-warning" name="btnPayment" value="Confirm Order"/> </td>
                    </tr>
                    {{ Form::close() }}
                </table>
            </div>

            <div class="clearfix"> </div>
        </div>
    </div>

@endsection()

