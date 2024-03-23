@extends('admin.master')

@section('title')
    Hall Edit
@endsection

@section('body')
    @include('admin.navber')
    <div id="layoutSidenav">
        @include('admin.sidebar')
        <div class="container-fluid">
            <div class="col-6 col-lg-6 mx-auto" style="margin-top: 80px">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-primary">Edit Hall Form</div>
                        <hr>
                        <h4 class="text-center text-success">{{ Session::get('message') }} </h4>
                        {{ Form::open(['url' => 'hall/update','method'=>'post', 'enctype'=>'multipart/form-data','name'=>'editHallForm']) }}
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
                            <input type="text" class="form-control form-control-rounded" name="hall_name" id="input-6" placeholder="Enter Hall Name" value="{{$hall->hall_name}}">
                            <input type="hidden" class="form-control form-control-rounded" name="hall_id" id="input-7" value="{{ $hall->id }}">
                            <span class="text-danger">{{ $errors->has('hall_name') ? $errors->first('hall_name') : '' }}</span>
                        </div> 

                        <div class="form-group">
                            <label for="input-11">Hall capacity</label>
                            <input type="number" class="form-control form-control-rounded" name="hall_capacity" id="input-11" placeholder="Enter Hall capacity" value="{{$hall->hall_capacity}}">
                            <span class="text-danger">{{ $errors->has('hall_capacity') ? $errors->first('hall_capacity') : '' }}</span>
                        </div>

                        <div class="form-group">
                            <label for="input-6">Hall Booking Price</label>
                            <input type="number" class="form-control form-control-rounded" name="hall_booking_price" id="input-6" placeholder="Enter Hall Booking Price" value="{{$hall->hall_booking_price}}">
                            <span class="text-danger">{{ $errors->has('hall_booking_price') ? $errors->first('hall_booking_price') : '' }}</span>
                        </div>
                        <div class="form-group">
                            <label for="input-6">Hall Location</label>
                            <input type="text" class="form-control form-control-rounded" name="hall_location" id="input-6" placeholder="Enter Hall Location" value="{{$hall->hall_location}}">
                            <span class="text-danger">{{ $errors->has('hall_location') ? $errors->first('hall_location') : '' }}</span>
                        </div>
                        <div class="form-group">
                            <label for="input-7">Hall Description</label>
                            <textarea class="form-control form-control-rounded" name="hall_description" id="input-7" placeholder="Enter Hall Description">{{$hall->hall_description}}</textarea>
                            <span class="text-danger">{{ $errors->has('hall_description') ? $errors->first('hall_description') : '' }}</span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="input-12">Hall Image</label>
                            <input type="file" class="form-control form-control-rounded" name="hall_image" id="input-12">
                            <img src="{{ asset($hall->hall_image) }}" alt="" width="60px" height="60px" />
                            <span class="text-danger">{{ $errors->has('hall_image') ? $errors->first('hall_image') : '' }}</span>
                        </div>
                        <div class="form-group radio mt-2">
                            <label for="input-8">Publish Status : </label>

                            <label id="input-8"><input type="radio" name="publication_status" {{$hall->publication_status == 1 ? 'checked' : ''}} value="1" /> Published</label>
                            <label id="input-8"><input type="radio" name="publication_status" {{$hall->publication_status == 0 ? 'checked' : ''}} value="0" /> Unpublished</label> <br>
                            <span class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : '' }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" name="btn" id="btnHall" class="btn btn-success btn-round px-5"><i class="icon-lock"></i> Update Hall Info</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.forms['editHallForm'].elements['category_id'].value = '{{ $hall->category_id }}';
        </script>
@endsection

