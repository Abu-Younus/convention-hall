@extends('admin.master')

@section('title')
foods Manage
@endsection

@section('body')
    @include('admin.navber')
    <div id="layoutSidenav">
        @include('admin.sidebar')
        <div class="container" style="margin-top: 80px; margin-left: 250px">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-primary">Edit Food Form</div>
                        <hr>
                        <h4 class="text-center text-success">{{ Session::get('message') }} </h4>
                        {{ Form::open(['url'=>'foods/update','method'=>'post', 'enctype'=>'multipart/form-data']) }}

                        <div class="form-group"> 
                            <label for="input-5">Select Hall Name</label>
                            @foreach($halls as $hall )
                                 <input type="text" class="form-control form-control-rounded"   id="input-6" readonly  value="{{ $hall->hall_name }} ">
                            @endforeach
                        </div>


                        <div class="form-group">
                            <label for="input-6">food Name</label>
                            <input type="text" class="form-control form-control-rounded" name="food_name" id="input-6" placeholder="Enter food Name" value="{{ $food->food_name }}">
                            <input type="hidden" class="form-control form-control-rounded" name="food_id" id="input-6" placeholder="Enter food Name" value="{{ $food->id }}">
                            <span class="text-danger">{{ $errors->has('food_name') ? $errors->first('food_name') : '' }}</span>
                        </div>
                        <div class="form-group">
                            <label for="input-7">food Description</label>
                            <textarea class="form-control form-control-rounded" name="food_description" id="input-7" placeholder="Enter food Description" >{{ $food->food_description }}</textarea>
                            <span class="text-danger">{{ $errors->has('food_description') ? $errors->first('food_description') : '' }}</span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="input-12">Food Image</label>
                            <input type="file" class="form-control form-control-rounded" name="food_image" id="input-12">
                            <img src="{{ asset($food->food_image) }}" alt="" width="60px" height="60px" />
                            <span class="text-danger">{{ $errors->has('food_image') ? $errors->first('food_image') : '' }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" name="btn" id="btnUpdateFoods" class="btn btn-success btn-round px-5"><i class="icon-lock"></i> Update food Info</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
    </div>
@endsection
