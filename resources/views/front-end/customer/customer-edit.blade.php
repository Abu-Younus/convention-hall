@extends('front-end.master')

@section('title')

    Customer Profile Update | Find Convention Hall

@endsection()

@section('body')
    <!-- Single Page -->
    <div class="banner_bottom_agile_info">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <h3 class="text-center text-primary"> Customer Profile Update </h3><hr>
                <h3 class="text-center text-success">{{Session::get('message')}}</h3><br>
                {{ Form::open(['url'=>'/customer/update', 'method'=>'POST', 'enctype'=>'multipart/form-data']) }}
                <div class="form-group">
                    <input type="text" class="form-control" name="first_name" value="{{ $customer->first_name }}" placeholder="First Name" required="">
                    <input type="hidden" class="form-control" name="customer_id" value="{{ $customer->id }}" placeholder="First Name" required="">
                    <span class="text-danger">{{ $errors->has('first_name') ? $errors->first('first_name') : '' }}</span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="last_name" value="{{ $customer->last_name }}" placeholder="Last Name" required="">
                    <span class="text-danger">{{ $errors->has('last_name') ? $errors->first('last_name') : '' }}</span>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="customer_email" name="email" value="{{ $customer->email }}" placeholder="Email Address" required="">
                    <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                    <span class="text-danger" id="email_check"></span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="phone_number" value="{{ $customer->phone_number }}" placeholder="Phone Number" required="">
                    <span class="text-danger">{{ $errors->has('phone_number') ? $errors->first('phone_number') : '' }}</span>
                </div>
                <div class="form-group">
                    <textarea name="address" class="form-control" placeholder="Address" required="">{{$customer->address}}</textarea>
                    <span class="text-danger">{{ $errors->has('address') ? $errors->first('address') : '' }}</span>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control form-control-rounded" name="customer_image"><br>
                    <img src="{{asset($customer->customer_image)}}" alt="" width="70px" height="80px" />
                    <span class="text-danger">{{ $errors->has('customer_image') ? $errors->first('customer_image') : '' }}</span>
                </div>
                <input type="submit" class="btn btn-success btn-block" name="btnUpdate" value="Update"><br>
                {{ Form::close() }}
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

    <script type="text/javascript">

        var customer_email = document.getElementById('customer_email');
        customer_email.onblur = function () {
            var email = document.getElementById('customer_email').value;
            var xmlHttp = new XMLHttpRequest();
            var serverPage = 'http://127.0.0.1:8000/ajax-email-check/'+email;
            xmlHttp.open('GET', serverPage);
            xmlHttp.onreadystatechange = function () {
                if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    document.getElementById('email_check').innerHTML = xmlHttp.responseText;
                    if(xmlHttp.responseText == 'Already Exist') {
                        document.getElementById('btnCustomerCreate').disabled = true;
                    }
                    else {
                        document.getElementById('btnCustomerCreate').disabled = false;
                    }
                }
            }
            xmlHttp.send(null);
        }
    </script>

@endsection()
