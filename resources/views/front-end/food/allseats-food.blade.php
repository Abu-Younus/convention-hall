@extends('front-end.master')

@section('title')
    food Manage
@endsection

@section('body')

    <!-- banner -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li> 
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active item16">
            <div class="container">
                <div class="carousel-caption">
                    <h3>Good Quality <span>Seats</span></h3>
                    <p>Special Seat</p>
                    <a class="hvr-outline-out button2" href="">See More </a>
                </div>
            </div>
        </div>
        <div class="item item15">
            <div class="container">
                <div class="carousel-caption">
                    <h3>Beautiful seat <span>Collection</span></h3>
                    <p>New Arrivals</p>
                    <a class="hvr-outline-out button2" href="">See More </a>
                </div>
            </div>
        </div>
        <div class="item item14">
            <div class="container">
                <div class="carousel-caption">
                    <h3>The awesome <span>Looking </span>Seat</h3>
                    <p>Special Seat</p>
                    <a class="hvr-outline-out button2" href="">See More </a>
                </div>
            </div>
        </div>
       
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!-- The Modal -->
</div> 


<div class="banner_bottom_agile_info">
    <div class="container">
        <div class="banner_bottom_agile_info_inner_w3ls">
        <h2 style="font-weight: 900; text-align: center; margin-top: 30px;margin-bottom: 30px;">All Seats</h2>

        @foreach($allseats as $allseat)
            <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid" style="margin-top: 20px;">
                <figure class="effect-roxy">
                    <img src="{{asset($allseat->seat_image)}}" alt=""  class="img-responsive"/>
                    <figcaption>
                        <h3>{{$allseat->seat_name}}</h3>
                        <p>{{$allseat->seat_description}} <br> <span style="font-weight: bold; color: red; background: white;" >{{$allseat->hall_name}}</span></p>
                    </figcaption>
                </figure>
            </div>
        @endforeach
 
            <div class="clearfix"></div>
        </div>
    </div>
</div>

@endsection
