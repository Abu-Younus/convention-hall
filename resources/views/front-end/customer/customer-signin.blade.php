@extends('front-end.master')

@section('title')

    Customer Login | Find Convention Hall

@endsection()

@section('body')
    <!-- Single Page -->
    <div class="banner_bottom_agile_info">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-primary"> Customer Login </h3>
                    </div>
                    <h4 class="text-center text-danger">{{ Session::get('message') }}</h4><br>
                    <div class="card-body">
                        {{ Form::open(['url'=>'/new/customer/signin', 'method'=>'POST']) }}
                        <div class="form-group">
                            <input type="email" class="form-control form-control-rounded" name="email" placeholder="Email Address" required="">
                            <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-rounded" name="password" placeholder="Password" required="">
                            <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                            <div>
                                <a href="">
                                    <h5 class="text-primary">
                                        forgot password?
                                    </h5>
                                </a>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="btnLogin" value="LogIn"><br>
                        <div class="form-group">
                            <a href="/customer/create">
                                <h5 class="text-center text-danger">
                                    You have don't account? Please create account!
                                </h5>
                            </a>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

@endsection()
