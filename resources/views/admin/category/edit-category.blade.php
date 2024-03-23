@extends('admin.master')

@section('title')
    Category Manage
@endsection

@section('body')
    @include('admin.navber')
    <div id="layoutSidenav">
        @include('admin.sidebar')
        <div class="container" style="margin-top: 80px; margin-left: 250px">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-primary">Edit Category Form</div>
                        <hr>
                        <h4 class="text-center text-success">{{ Session::get('message') }} </h4>
                        {{ Form::open(['url'=>'category/update','method'=>'post']) }}
                        <div class="form-group">
                            <label for="input-6">City Name</label>
                            <input type="text" class="form-control form-control-rounded" name="category_name" id="input-6" placeholder="Enter City Name" value="{{ $category->category_name }}">
                            <input type="hidden" class="form-control form-control-rounded" name="category_id" id="input-6" placeholder="Enter City Name" value="{{ $category->id }}">
                            <span class="text-danger">{{ $errors->has('category_name') ? $errors->first('category_name') : '' }}</span>
                        </div>
                        <div class="form-group">
                            <label for="input-7">Category Description</label>
                            <textarea class="form-control form-control-rounded" name="category_description" id="input-7" placeholder="Enter Category Description" >{{ $category->category_description }}</textarea>
                            <span class="text-danger">{{ $errors->has('category_description') ? $errors->first('category_description') : '' }}</span>
                        </div>
                        <div class="form-group radio mt-2">
                            <label for="input-8">Publish Status : </label>

                            <label id="input-8"><input type="radio" name="publication_status" {{ $category->publication_status==1 ? 'checked' : '' }} value="1" /> Published</label>
                            <label id="input-8"><input type="radio" name="publication_status" {{ $category->publication_status==0 ? 'checked' : '' }} value="0" /> Unpublished</label> <br>
                            <span class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : '' }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" name="btn" id="btnUpdateCategory" class="btn btn-success btn-round px-5"><i class="icon-lock"></i> Update Category Info</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
    </div>
@endsection
