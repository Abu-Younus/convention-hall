@extends('admin.master')

@section('title')
    Hall Add
@endsection

@section('body')
    @include('admin.navber')
    <div id="layoutSidenav">
        @include('admin.sidebar')
        <div class="container-fluid">
            <div class="col-6 col-lg-6 mx-auto" style="margin-top: 80px">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-primary">Add Hall Form</div>
                        <hr>
                        <h4 class="text-center text-success">{{ Session::get('message') }} </h4>
                        {{ Form::open(['url' => 'hall/save','method'=>'post', 'enctype'=>'multipart/form-data']) }}
                        <div class="form-group">

                            <label for="input-5">City Name</label>
                            <select class="form-control form-control-rounded" id="input-5" name="category_id">
                                <option value="#">-----Select City Name-----</option>
                                @foreach($categories as $category )
                                    <option value="{{ $category->id }}"> {{ $category->category_name }}  </option>
                                @endforeach
                            </select>

                            <span class="text-danger">{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>

                        </div>
                        <div class="form-group">
                            <label for="input-6">Hall Name</label>
                            <input type="text" class="form-control form-control-rounded" name="hall_name" id="input-6" placeholder="Enter Hall Name">
                            <span class="text-danger">{{ $errors->has('hall_name') ? $errors->first('hall_name') : '' }}</span>
                        </div> 

                        <div class="form-group">
                            <label for="input-6">Hall Capacity</label>
                            <input type="number" class="form-control form-control-rounded" name="hall_capacity" id="input-6" placeholder="Enter Hall capacity">
                            <span class="text-danger">{{ $errors->has('hall_capacity') ? $errors->first('hall_capacity') : '' }}</span>
                        </div>

                        <div class="form-group">
                            <label for="input-6">Hall Booking Price</label>
                            <input type="number" class="form-control form-control-rounded" name="hall_booking_price" id="input-6" placeholder="Enter Hall Booking Price">
                            <span class="text-danger">{{ $errors->has('hall_booking_price') ? $errors->first('hall_booking_price') : '' }}</span>
                        </div>
                        <div class="form-group">
                            <label for="input-6">Hall Location</label>
                            <input type="text" class="form-control form-control-rounded" name="hall_location" id="input-6" placeholder="Enter Hall Location">
                            <span class="text-danger">{{ $errors->has('hall_location') ? $errors->first('hall_location') : '' }}</span>
                        </div>
                        <div class="form-group">
                            <label for="input-7">Hall Description</label>
                            <textarea class="form-control form-control-rounded" name="hall_description" id="input-7" placeholder="Enter Hall Description"></textarea>
                            <span class="text-danger">{{ $errors->has('hall_description') ? $errors->first('hall_description') : '' }}</span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="input-12">Hall Image</label>
                            <input type="file" class="form-control form-control-rounded" name="hall_image" id="input-12">
                            <span class="text-danger">{{ $errors->has('hall_image') ? $errors->first('hall_image') : '' }}</span>
                        </div>
                        <div class="form-group radio mt-2">
                            <label for="input-8">Publish Status : </label>

                            <label id="input-8"><input type="radio" name="publication_status" value="1" /> Published</label>
                            <label id="input-8"><input type="radio" name="publication_status" value="0" /> Unpublished</label> <br>
                            <span class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : '' }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" name="btn" id="btnHall" class="btn btn-success btn-round px-5"><i class="icon-lock"></i> Save Hall Info</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
@endsection

