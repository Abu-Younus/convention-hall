@extends('admin.master')

@section('title')
    Hall Manage
@endsection


@section('body')
    @include('admin.navber')
    <div id="layoutSidenav">
        @include('admin.sidebar')
        <style>
    table,.btn{
     font-size: 12px;
    }
</style>
        <div class="container" style="margin-top: 80px; margin-left: 220px;">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-header text-primary">Hall Table</div>
                    <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="dataTable">
                                <thead>
                                <th>SL</th>
                                <th>City</th>
                                <th>Hall Name</th>
                                
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($OrderDetail as $OrderDetails)
                                    <tr>

                                        <td>{{ $i++ }}</td>
                                        <td>{{ $OrderDetail->hall_name }}</td>
                                        <td>{{ $OrderDetail->hall_price }}</td>  

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
