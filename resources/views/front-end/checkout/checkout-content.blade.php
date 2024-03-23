@extends('front-end.master')

@section('title')

    Checkout | Find Convention Hall

@endsection()

@section('body')
    <!-- Single Page -->
    <div class="banner_bottom_agile_info">
        <div class="container">
            <h3 class="text-center text-primary">User Login & Registration</h3><hr>
            <div class="col-md-6">
                <h4 class="text-center">You have no account....<span class="text-danger">Create Account.!</span> </h4><br>
                {{ Form::open(['url' => 'customer/signup', 'method'=>'POST']) }}
                <div class="form-group">
                    <input type="text" class="form-control" name="first_name" placeholder="First Name" required="">
                    <span class="text-danger">{{ $errors->has('first_name') ? $errors->first('first_name') : '' }}</span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" required="">
                    <span class="text-danger">{{ $errors->has('last_name') ? $errors->first('last_name') : '' }}</span>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="customer_email" name="email" placeholder="Email Address" required="">
                    <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                    <span class="text-danger" id="email_check"></span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password"placeholder="Password" required="">
                    <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                    <span id="strength"></span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="">
                    <span class="text-danger">{{ $errors->has('confirm_password') ? $errors->first('confirm_password') : '' }}</span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" required="">
                    <span class="text-danger">{{ $errors->has('phone_number') ? $errors->first('phone_number') : '' }}</span>
                </div>
                <div class="form-group">
                    <textarea name="address" class="form-control" placeholder="Address" required=""></textarea>
                    <span class="text-danger">{{ $errors->has('address') ? $errors->first('address') : '' }}</span>
                </div>
                <input type="submit" class="btn btn-success btn-block" name="btnRegistration" id="btnRegistration" value="Sign Up"><br>
                {{ Form::close() }}
            </div>
            <div class="col-md-6">
                <h4 class="text-center">You have Already account....<span class="text-success">Please Login.!</span> </h4><br>
                <h4 class="text-center text-danger">{{ Session::get('message') }}</h4> <br>
                {{ Form::open(['url' => '/customer/login', 'method'=>'POST']) }}
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email Address" required="">
                    <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="">
                    <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                </div>
                <input type="submit" class="btn btn-success btn-block" name="btnLogin" value="LogIn">
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
                        document.getElementById('btnRegistration').disabled = true;
                    }
                    else {
                        document.getElementById('btnRegistration').disabled = false;
                    }
                }
            }
            xmlHttp.send(null);
        }

        var pwd = document.getElementById("password");

        pwd.onkeyup = function() {
            var strength = document.getElementById("strength");
            var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
            var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
            var enoughRegex = new RegExp("(?=.{6,}).*", "g");
            if (pwd.value.length==0) {
                strength.innerHTML = '';
            } else if (false == enoughRegex.test(pwd.value)) {
                strength.innerHTML = 'More Characters';
            } else if (strongRegex.test(pwd.value)) {
                strength.innerHTML = '<span style="color:green">Strong!</span>';
            } else if (mediumRegex.test(pwd.value)) {
                strength.innerHTML = '<span style="color:orange">Medium!</span>';
            } else {
                strength.innerHTML = '<span style="color:red">Weak!</span>';
            }
        }

    </script>

@endsection()

