@extends('front-end.master')

@section('title')

    Hall Details | Find Convention Hall

@endsection()

@section('body')
    <!-- banner-bootom-w3-agileits -->
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <h3 class="text-center text-primary">Halls Details</h3>
            <hr>
            <div class="col-md-4 single-right-left ">
                <div class="grid images_3_of_2">
                    <div class="flexslider">

                        <ul class="slides">
                            <li data-thumb="{{ asset($hall->hall_image) }}">
                                <div class="thumb-image"> <img src="{{ asset($hall->hall_image) }}" data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                            <li data-thumb="{{ asset($hall->hall_image) }}">
                                <div class="thumb-image"> <img src="{{ asset($hall->hall_image) }}" data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                            <li data-thumb="{{ asset($hall->hall_image) }}">
                                <div class="thumb-image"> <img src="{{ asset($hall->hall_image) }}" data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 single-right-left simpleCart_shelfItem">
                <h3>{{ $hall->hall_name }}</h3>
                <p><span class="item_price text-danger"><span class="text-primary"> Price : </span>TK. {{ $hall->hall_booking_price }}</span></p>
                <p><span class="item_price text-danger"><span class="text-primary"> Capacity : </span>{{ $hall->hall_capacity }} People</span></p>
                <p><span class="item_price text-dark"><span class="text-dark"> Location : </span>{{ $hall->hall_location }}</span></p>
                <div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
                </div>
                <div class="description">
                    <h4 class="text-danger">Quick Overview :</h4>
                    <br><span class="text-black-50">{{ $hall->hall_description }}</span>
                </div> 
       
                <div class="alert alert-danger" role="alert" id="alert">
                    The capacity limit is <strong>{{ $hall->hall_capacity }}!</strong> You cannot add more than that.
                </div>
                 

                {{ Form::open(['url' => '/add-to-cart', 'method'=>'POST']) }}
                <div class="color-quality" style="display: flex; align-item: center;">
                    <div class="color-quality-right">
                        <h4 class="text-danger">Booking Days :</h4>
                        <input type="number" name="qty" value="1" min="1" style="height:40px; margin-right: 20px;" />
                        <input type="hidden" name="id" value="{{ $hall->id }}" />
                    </div>
                    <div class="color-quality-right">
                        <h4 class="text-danger">Total People :</h4>
                        <input type="number" name="total_people" id="total_people" onkeyup="myPeopleEntry()" style="height:40px;  margin-right: 20px;"  />
                     </div>
                    <div class="color-quality-right">
                        <h4 class="text-danger">Available dates :</h4>
                        <input type="text" id="datepicker" name="order_date" style="height:40px;"  value=""  />
                     </div>  
                </div> 
                <br>
                <style>
                    .dselect-wrapper .form-select{
                        width: 200px;
                        margin-right: 15px;
                        background: white;
                        border: 1px solid #464646; 
                        max-height: auto;
                        padding: 6px;
                    }
                     
                    button.dropdown-item{
                        margin-right: 5px;
                        margin-bottom: 5px;
                    }
                </style>
 
                 <link href="{{ asset('/') }}front-end/css/dselect.min.css" rel="stylesheet" type="text/css" media="all" />
                <div class="color-quality" style="display: flex; align-item: center;">
                    <div class="color-quality-right">
                        <h4 class="text-danger">Select Foods :</h4> 
                        <select class="form-select form-select-lg mb-3" name="totalfood[]" id="example-multiple" multiple>
                                <option value="">Choose Foods---</option>
                                @foreach($foods as $food )
                                    <option value="{{ $food->food_name }}"> {{ $food->food_name }}  </option>
                                @endforeach
                        </select>  
                    </div>
                    <script src="https://unpkg.com/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

                <script src="{{ asset('/') }}front-end/css/dselect.min.js"></script>
 
                    <div class="color-quality-right">
                        <h4 class="text-danger">Sitting Arrangement:</h4>
                        <select class="form-select form-select-lg mb-3" name="seattype">
                                <option value="">Choose Seat type---</option>
                                @foreach($seats as $seat )
                                    <option value="{{ $seat->seat_name }}"> {{ $seat->seat_name }}  </option>
                                @endforeach
                        </select>
                    </div>  
                    <div class="color-quality-right" style="margin-left: 25px;">
                        <h4 class="text-danger">Shift:</h4>
                        <select class="form-select form-select-lg mb-3" name="hall_shift" id="hall_shift" >
                                <option value="">Choose shift type---</option> 
                                <option value="day">day</option> 
                                <option value="night">night</option> 
                        </select>
 
                    </div> 
                </div>
                <br>  <br> 
                @if(Session::get('customerId'))
                    <div class="occasion-cart">
                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                            <input type="submit" name="btn" value="Add to cart" class="button">
                        </div> 
                    </div> 
                @else 
                    <div class="alert alert-danger" role="alert" id="alert">
                        You have to Log in to <strong>"Add to Cart"</strong>
                    </div> 
                @endif  
                
                {{ Form::close() }}

                <ul class="social-nav model-3d-0 footer-social w3_agile_social single_page_w3ls">
                    <li class="share">Share On : </li>
                    <li><a href="#" class="facebook">
                            <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
                    <li><a href="#" class="twitter">
                            <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
                    <li><a href="#" class="instagram">
                            <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
                    <li><a href="#" class="pinterest">
                            <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
                </ul>

            </div>
            <div class="clearfix"> </div>
            <!--/slider_owl-->

            <div class="w3_agile_latest_arrivals">
                <h3 class="wthree_text_info">Featured <span>Arrivals</span></h3>
                @foreach($relatedHalls as $releatedHall)
                    <div class="col-md-3 product-men single">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="{{ asset($releatedHall->hall_image) }}" alt="" class="pro-image-front">
                                <img src="{{ asset($releatedHall->hall_image) }}" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="/hall/view/{{$releatedHall->id}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="/hall/view/{{$releatedHall->id}}">{{ $releatedHall->hall_name }}</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">TK. {{ $releatedHall->hall_booking_price }}</span>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <a href="/hall/view/{{$releatedHall->id}}">
                                        <input type="submit" class="button" name="btn" value="View Details" />
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach()
                <div class="clearfix"> </div> 
            </div>
        </div>
    </div>


    <div>

    <style>
        td.disabled.disabled-date.day {
            background: #e9f9ff;
        }
        td.disabled.disabled-date.day:hover {
            background: #c5e3ef;
        }
    </style>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>
<script>
    
</script>
        <script>
            var page_data = {{ Js::from($orderss) }};   
            var datearray = [];
            for(var i =0;i<page_data.length;i++)
            {
                var strinag = page_data[i].order_date;
                var condate= strinag.substring(0, 10); 
                datearray[i] = condate;
            }  
            if(datearray.length == 0){
                datearray[0]= '2011-01-01'
            }
            else{
                datearray = datearray
            } 
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd',       
                datesDisabled: datearray, 
                weekStart: 1, 
                autoclose:true,
                startDate: new Date() ,
                todayHighlight: true,
            });
            
            function myPeopleEntry() {
                var total_people = document.getElementById("total_people").value;
                var total_capacity = {{ Js::from($hall->hall_capacity) }}; 
                if(total_people > total_capacity) 
                { 
                    alert("You cannot enter more than the capacity limit. !!!"); 
                    document.getElementById("total_people").value = '0'; 
                }
            }

           
        </script>
        <script>
             // multiple
    dselect(document.querySelector('#example-multiple'))

     
  
// Validation
// Enable dselect on all '.dselect'
for (const el of document.querySelectorAll('.dselect')) {
  dselect(el)
}
// Example starter JavaScript for disabling form submissions if there are invalid fields
void (function() {
  document.querySelectorAll('.needs-validation').forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    })
  })
})()
        </script>
    </div> 
@endsection()
