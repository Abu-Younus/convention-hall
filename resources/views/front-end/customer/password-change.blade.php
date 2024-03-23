@extends('front-end.master')

@section('title')

    Customer Password Change | Find Convention Hall

@endsection()

@section('body')
    <!-- Single Page -->
    <div class="banner_bottom_agile_info">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <h3 class="text-center text-primary"> Your Password Update Form </h3><hr>
                @if(session()->has('error'))
                    <span class="alert alert-danger">
                        <strong>{{ session()->get('error') }}</strong>
                    </span>
                @endif <br>
                {{ Form::open(['url'=>'/password/update', 'method'=>'POST']) }}
                <div class="form-group">
                    <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Old Password" required="">
                    <input type="hidden" class="form-control" name="customer_id" value="{{$customer->id}}" required="">
                    @error('old_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" required="">
                    @error('new_password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <span id="strength"></span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="">
                    <span class="text-danger">{{ $errors->has('confirm_password') ? $errors->first('confirm_password') : '' }}</span>
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

        var pwd = document.getElementById("new_password");

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
