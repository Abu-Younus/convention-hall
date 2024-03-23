@extends('front-end.master')

@section('title')

    Shipping Info | Find Convention Hall

@endsection()

@section('body')
    <!-- Single Page -->
    <div class="banner_bottom_agile_info">
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <h3 class="text-center">Dear <span class="text-success">{{ Session::get('customerName') }}</span>
                    <p class="text-danger"><br>You have to give us shipping info to complete your Hall Booking.</p>
                </h3><br>
                {{ Form::open(['url'=>'shipping/save', 'method'=>'POST']) }}
                <div class="form-group">
                    <input type="text" class="form-control" name="full_name" value="{{ $customer->first_name.' '.$customer->last_name }}" required="">
                    <span class="text-danger">{{ $errors->has('full_name') ? $errors->first('full_name') : '' }}</span>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}" required="">
                    <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                    <span class="text-danger" id="email_check"></span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="phone_number" value="{{ $customer->phone_number }}" required="">
                    <span class="text-danger">{{ $errors->has('phone_number') ? $errors->first('phone_number') : '' }}</span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="city" placeholder="City" required="">
                    <span class="text-danger">{{ $errors->has('city') ? $errors->first('city') : '' }}</span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="post_code" placeholder="Post Code" required="">
                    <span class="text-danger">{{ $errors->has('post_code') ? $errors->first('post_code') : '' }}</span>
                </div>
                <div class="form-group">
                    <textarea name="address" class="form-control" required="">{{ $customer->address }}</textarea>
                    <span class="text-danger">{{ $errors->has('address') ? $errors->first('address') : '' }}</span>
                </div>
                <input type="submit" class="btn btn-success btn-block" name="btn" value="Save Shipping Info">
                {{ Form::close() }}
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

@endsection()

