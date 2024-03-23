@extends('admin.master')

@section('title')
    seat Manage
@endsection

@section('body')
    @include('admin.navber')
    <div id="layoutSidenav">
        @include('admin.sidebar')
        <div class="container" style="margin-top: 80px; margin-left: 220px;">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-header text-primary">seats Table</div>
                        <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable">
                                    <thead>
                                    <th>SL</th>
                                    <th>seat Name</th>
                                    <th>seat Description</th> 
                                    <th>seat image</th> 
                                    <th>Hall Name</th> 
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($seats as $seat)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $seat->seat_name }}</td>
                                            <td>{{ $seat->seat_description }}</td> 
                                            <td> <img src="{{asset($seat->seat_image)}}" alt="" width="70px" height="50px"/> </td>

                                            <td>{{ $seat->hall_name }}</td> 

                                            <td>
                                                 
                                                <a href="/seats/edit/{{$seat->id}}" class="btn btn-info btn-xs" title="edit">
                                                <i class="fa-solid fa-pencil"></i>
                                                    
                                                </a>
                                                <a href="/seats/delete/{{$seat->id}}" class="btn btn-danger btn-xs" title="delete">
                                                 
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
            </div>
        </div>
    </div>
@endsection
