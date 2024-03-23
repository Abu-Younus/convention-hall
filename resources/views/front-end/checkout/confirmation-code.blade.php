@extends('front-end.master')

@section('title')

    Registration Confirmation | Find Convention Hall

@endsection()

@section('body')
    <!-- Single Page -->
    <div class="banner_bottom_agile_info">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <h3 class="text-center"> Your <span class="text-primary"> email address : </span>
                    <a href="{{ url('https://mail.google.com/mail') }}">
                        {{ Session::get('customerEmail') }}
                    </a><br><p class="text-success"> send for confirmation code. </p>
                </h3><br>
                <h4 class="text-center text-danger">{{ Session::get('message') }}</h4><br>
                {{ Form::open(['url' => 'account/verify', 'method'=>'POST']) }}
                <div class="form-group">
                    <input type="text" class="form-control" name="confirmation_code" placeholder="Enter Confirmation Code" required="">
                    <span class="text-danger">{{ $errors->has('confirmation_code') ? $errors->first('confirmation_code') : '' }}</span>
                </div>
                <input type="submit" class="btn btn-success btn-block" name="btn" value="Confirm Registration"><br>
                <a href="/resend/code/{{Session::get('customerId')}}"> <h4 class="text-primary bg-dark">Resend code?</h4> </a>
                {{ Form::close() }}
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

@endsection()

