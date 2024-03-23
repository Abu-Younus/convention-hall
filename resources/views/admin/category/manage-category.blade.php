@extends('admin.master')

@section('title')
    Category Manage
@endsection

@section('body')
    @include('admin.navber')
    <div id="layoutSidenav">
        @include('admin.sidebar')
        <div class="container" style="margin-top: 80px; margin-left: 220px;">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-header text-primary">Category Table</div>
                        <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable">
                                    <thead>
                                    <th>SL</th>
                                    <th>City Name</th>
                                    <th>City Description</th>
                                    <th>Publish Status</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td style="width: 60%;">{{ $category->category_description }}</td>
                                            <td>{{ $category->publication_status==1 ? 'Published' : 'Unpublished' }}</td>
                                            <td>
                                                @if($category->publication_status==1)
                                                    <a href="/category/unpublished/{{$category->id}}" class="btn btn-primary btn-xs" title="Published">
                                                        <span class="glyphicon glyphicon-arrow-up">Pub</span>
                                                    </a>
                                                @else
                                                    <a href="/category/published/{{$category->id}}" class="btn btn-warning btn-xs" title="Unpublished">
                                                        <span class="glyphicon glyphicon-arrow-down">Upub</span>
                                                    </a>
                                                @endif
                                                <a href="/category/edit/{{$category->id}}" class="btn btn-info btn-xs" title="edit">
                                                <i class="fa-solid fa-pencil"></i>
                                                    
                                                </a>
                                                <a href="/category/delete/{{$category->id}}" class="btn btn-danger btn-xs" title="delete">
                                                 
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
