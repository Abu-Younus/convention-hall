@extends('admin.master')

@section('title')
    Customer Manage
@endsection

@section('body')
    @include('admin.navber')
    <div id="layoutSidenav">
        @include('admin.sidebar')
        <div class="container" style="margin-top: 80px; margin-left: 220px;">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-header text-primary">Customer Table</div><br>
                        <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                        <h4 class="text-center text-danger">{{ Session::get('messages') }}</h4>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush table-borderless" id="dataTable">
                                    <thead>
                                    <th>SL</th>
                                    <th>Customer Name</th>
                                    <th>Email Address</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>Image</th>
                                    <th>Active Status</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $customer->first_name.' '.$customer->last_name }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->phone_number }}</td>
                                            <td>{{ $customer->address }}</td>
                                            <td><img src="{{asset($customer->customer_image)}}" alt="" width="30px" height="40px" /> </td>
                                            <td>{{$customer->active_status == 1 ? 'Active' : 'Blocked'}}</td>
                                            <td>
                                                @if($customer->active_status==1)
                                                    <a href="/customer/blocked/{{$customer->id}}" class="btn btn-danger btn-xs" title="Blocked">
                                                        <span class="glyphicon glyphicon-arrow-up">Blocked</span>
                                                    </a>
                                                @else
                                                    <a href="/customer/active/{{$customer->id}}" class="btn btn-success btn-xs" title="Active">
                                                        <span class="glyphicon glyphicon-arrow-down">Active</span>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
