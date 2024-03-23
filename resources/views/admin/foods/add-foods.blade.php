@extends('admin.master')

@section('title')
    Foods Add
@endsection

@section('body')
    @include('admin.navber')
    <div id="layoutSidenav">
        @include('admin.sidebar')
        <div class="container-fluid">
            <div class="col-6 col-lg-6 mx-auto" style="margin-top: 80px">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-primary">Add Foods Form</div>
                        <hr>
                        <h4 class="text-center text-success">{{ Session::get('message') }} </h4>
                        {{ Form::open(['url' => 'foods/save','method'=>'post',  'enctype'=>'multipart/form-data']) }}

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
                            <label for="input-6">Food Name</label>
                            <input type="text" class="form-control form-control-rounded" name="food_name" id="input-6" placeholder="Enter food Name">
                            <span class="text-danger">{{ $errors->has('food_name') ? $errors->first('food_name') : '' }}</span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="input-7">Food Description</label>
                            <textarea class="form-control form-control-rounded" name="food_description" id="input-7" placeholder="Enter food Description"></textarea>
                            <span class="text-danger">{{ $errors->has('food_description') ? $errors->first('food_description') : '' }}</span>
                        </div> 
                        <div class="form-group mt-2">
                            <label for="input-12">Food Image</label>
                            <input type="file" class="form-control form-control-rounded" name="food_image" id="input-12" required>
                            <span class="text-danger">{{ $errors->has('food_image') ? $errors->first('food_image') : '' }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" name="btn" id="btnFood" class="btn btn-success btn-round px-5"><i class="icon-lock"></i> Save food Info</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
    </div>
@endsection

