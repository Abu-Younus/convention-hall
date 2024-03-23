@extends('admin.master')

@section('title')
    seats Add
@endsection

@section('body')
    @include('admin.navber')
    <div id="layoutSidenav">
        @include('admin.sidebar')
        <div class="container-fluid">
            <div class="col-6 col-lg-6 mx-auto" style="margin-top: 80px">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-primary">Add seats Form</div>
                        <hr>
                        <h4 class="text-center text-success">{{ Session::get('message') }} </h4>
                        {{ Form::open(['url' => 'seats/save','method'=>'post',  'enctype'=>'multipart/form-data']) }}

                        <div class="form-group"> 
                            <label for="input-5">Select Hall Name</label>
                            <select class="form-control form-control-rounded" id="input-5" name="hall_id">
                                <option value="#">-----Select Hall Name-----</option>
                                @foreach($halls as $hall )
                                    <option value="{{ $hall->id }}"> {{ $hall->hall_name }}  </option>
                                @endforeach
                            </select> 
                        </div>


                        <div class="form-group">
                            <label for="input-6">seat Name</label>
                            <input type="text" class="form-control form-control-rounded" name="seat_name" id="input-6" placeholder="Enter seat Name">
                            <span class="text-danger">{{ $errors->has('seat_name') ? $errors->first('seat_name') : '' }}</span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="input-7">seat Description</label>
                            <textarea class="form-control form-control-rounded" name="seat_description" id="input-7" placeholder="Enter seat Description"></textarea>
                            <span class="text-danger">{{ $errors->has('seat_description') ? $errors->first('seat_description') : '' }}</span>
                        </div> 
                        <div class="form-group mt-2">
                            <label for="input-12">Seat Image</label>
                            <input type="file" class="form-control form-control-rounded" name="seat_image" id="input-12" required>
                            <span class="text-danger">{{ $errors->has('seat_image') ? $errors->first('seat_image') : '' }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" name="btn" id="btnseat" class="btn btn-success btn-round px-5"><i class="icon-lock"></i> Save seat Info</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
   
    </div>
@endsection

