@extends('front-end.master')

@section('title')

    Customer Dashboard | Find Convention Hall

@endsection()

@section('body')
    <!-- Single Page -->
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <div class="checkout-right">
                <div class="row">
                    <div class="row">
                        <div class="col-md-11 col-md-offset-1">
                            <a href="/customer/edit/{{$customer->id}}" class="btn btn-warning pull-right">Update</a>
                            <a href="/password/change/{{$customer->id}}" class="btn btn-danger">Change Password</a>
                        </div>
                    </div><hr>
                </div>
                <h3 class="text-center text-primary"> My Profile </h3><hr>
                <h3 class="text-center text-success">{{Session::get('message')}}</h3><br>
                <div class="col-md-6 col-md-offset-3 table-responsive border-primary">
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td>{{$customer->first_name. ' ' .$customer->last_name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$customer->email}}</td>
                        </tr>
                        <tr>
                            <th>Mobile</th>
                            <td>{{$customer->phone_number}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$customer->address}}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            @if($customer->customer_image == null)
                                {{ Form::open(['url'=>'/image/save', 'method'=>'POST', 'enctype'=>'multipart/form-data']) }}
                                <td>
                                    <input type="file" class="form-control form-control-rounded" name="customer_image"><br>
                                    <input type="hidden" class="form-control form-control-rounded" name="customer_id" value="{{$customer->id}}">
                                    <input type="hidden" class="form-control form-control-rounded" name="customer_name" value="{{$customer->first_name.' '.$customer->last_name}}">
                                    <button type="submit" name="btn" id="btnAdd" class="btn btn-success btn-round px-5">Add</button>
                                </td>
                                {{ Form::close() }}
                            @else
                                <td>
                                    <img src="{{asset($customer->customer_image)}}" alt="" width="70px" height="80px" />
                                </td>
                            @endif
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection()
