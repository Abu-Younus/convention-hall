@extends('admin.master')

@section('title')
    Category Add
@endsection

@section('body')
    @include('admin.navber')
    <div id="layoutSidenav">
        @include('admin.sidebar')
        <div class="container-fluid">
            <div class="col-6 col-lg-6 mx-auto" style="margin-top: 80px">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-primary">Add Category Form</div>
                        <hr>
                        <h4 class="text-center text-success">{{ Session::get('message') }} </h4>
                        {{ Form::open(['url' => 'category/save','method'=>'post']) }}
                        <div class="form-group">
                            <label for="input-6">City Name</label>
                            <input type="text" class="form-control form-control-rounded" name="category_name" id="input-6" placeholder="Enter City Name">
                            <span class="text-danger">{{ $errors->has('category_name') ? $errors->first('category_name') : '' }}</span>
                        </div>
                        <div class="form-group">
                            <label for="input-7">City Description</label>
                            <textarea class="form-control form-control-rounded" name="category_description" id="input-7" placeholder="Enter City Description"></textarea>
                            <span class="text-danger">{{ $errors->has('category_description') ? $errors->first('category_description') : '' }}</span>
                        </div>
                        <div class="form-group radio mt-2">
                            <label for="input-8">Publish Status : </label>

                            <label id="input-8"><input type="radio" name="publication_status" value="1" /> Published</label>
                            <label id="input-8"><input type="radio" name="publication_status" value="0" /> Unpublished</label> <br>
                            <span class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : '' }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" name="btn" id="btnCategory" class="btn btn-success btn-round px-5"><i class="icon-lock"></i> Save Category Info</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
    </div>
@endsection

