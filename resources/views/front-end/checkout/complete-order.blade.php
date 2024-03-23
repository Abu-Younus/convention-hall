@extends('front-end.master')

@section('title')

    Complete Booking | Find Convention Hall

@endsection()

@section('body')
    <!-- Single Page -->
    <div class="banner_bottom_agile_info">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <h3 class="text-center">Dear <span class="text-success">{{ Session::get('customerName') }}</span><br><br>
                    <span class="text-success">Your order submit succesfully.<br><br>
                        <h4 class="text-primary">Thanks for....
                            <span class="text-danger">booking and browse our community.</span>
                        </h4>
                    </span>
                </h3>
                <br>
                <h4 class="text-center text-success">Your order Info send in
                    <a href="{{ url('https://mail.google.com/mail') }}" class="btn btn-info"><span class="text-light">{{ Session::get('customerEmail') }}</span></a>
                </h4>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <br>
                <table class="table table-bordered">

                </table>
            </div>

            <div class="clearfix"> </div>
        </div>
    </div>

@endsection()

