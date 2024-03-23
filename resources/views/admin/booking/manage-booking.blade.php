@extends('admin.master')

@section('title')
    Booking Manage
@endsection

@section('body')
    @include('admin.navber')
    <div id="layoutSidenav">
        @include('admin.sidebar')
        <div class="container" style="margin-top: 80px; margin-left: 220px;">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-header text-primary">Booking Table</div>
                    <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush table-borderless" id="dataTable">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Customer Name</th>
                                    <th>Booking Total</th>
                                    <th>Booking Date</th>
                                    <th>Booking Status</th>
                                    <th>Payment Type</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($bookings as $booking)
                                    <tr>

                                        <td>{{ $i++ }}</td>
                                        <td>{{ $booking->first_name.' '.$booking->last_name }}</td>
                                        <td>{{ $booking->order_total }}</td>
                                        <td>{{ $booking->created_at }}</td>
                                        <td>{{ $booking->order_status }}</td>
                                        <td>{{ $booking->payment_type }}</td>
                                        <td>{{ $booking->payment_status }}</td>
                                        <td>
                                            <a href="/booking/details/{{$booking->id}}" class="btn btn-info btn-xs text-light" title="Booking Details">

                                                <span class="glyphicon glyphicon-zoom-in">Details</span>

                                            </a>

                                            <a href="/booking/invoice/{{$booking->id}}" class="btn btn-warning btn-xs text-light" title="Booking Invoice">

                                                <span class="glyphicon glyphicon-zoom-out">Invoice</span>

                                            </a>

                                            <a href="/booking/invoice/download/{{$booking->id}}" class="btn btn-secondary btn-xs text-light" title="Download Booking Invoice">

                                                <span class="glyphicon glyphicon-download">Download</span>

                                            </a>

                                            <a href="/booking/edit/{{$booking->id}}" class="btn btn-success btn-xs" title="Edit Booking">

                                                <i class="fa-solid fa-pencil"></i>

                                            </a>

                                            <a href="/booking/delete/{{$booking->id}}" class="btn btn-danger btn-xs" title="Delete Booking">

                                                <i class="fa-solid fa-trash"></i>   

                                            </a>

                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--start overlay-->
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->
        </div>
    </div>
@endsection
