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
                                <th>Price per day</th>
                                <th>Capacity</th> 
                                <th>Location</th>
                                <th>Image</th>
                                <th>Publish Status</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($halls as $hall)
                                    <tr>

                                        <td>{{ $i++ }}</td>
                                        <td>{{ $hall->category_name }}</td>
                                        <td>{{ $hall->hall_name }}</td>
                                        <td>{{ $hall->hall_booking_price }}</td>
                                        <td>{{ $hall->hall_capacity}} People</td>
                                        <td style="width: 25%;">{{ $hall->hall_location }}</td>
                                        <td> <img src="{{asset($hall->hall_image)}}" alt="" width="60px" height="60px"/> </td>
                                        <td>{{ $hall->publication_status==1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            @if($hall->publication_status==1)

                                                <a href="/hall/unpublished/{{$hall->id}}" class="btn btn-primary" title="published">

                                                    <span class="zmdi zmdi-long-arrow-up"></span>pub

                                                </a>

                                            @else
                                                <a href="/hall/published/{{$hall->id}}" class="btn btn-warning" title="unpublished">

                                                    <span class="zmdi zmdi-long-arrow-down"></span>Upub

                                                </a>

                                            @endif

                                            <a href="/hall/edit/{{$hall->id}}" class="btn btn-success" title="edit">

                                            <i class="fa-solid fa-pencil"></i>

                                            </a>

                                            <a href="/hall/delete/{{$hall->id}}" class="btn btn-danger" title="delete">

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
