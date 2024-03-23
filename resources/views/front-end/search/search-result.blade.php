@extends('front-end.master')

@section('title')
    Search Result | Find Convention Hall
@endsection()

@section('body')
    <!-- banner-bootom-w3-agileits -->
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <h3 class="text-success text-center">{{  $searchHalls->count() }} results for {{ request()->input('search') }} </h3>
            <div class="single-pro">
                @foreach($searchHalls as $searchHall)
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="{{ asset($searchHall->hall_image) }}" alt="" class="pro-image-front">
                                <img src="{{ asset($searchHall->hall_image) }}" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="/hall/view/{{$searchHall->id}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>
                            </div>
                            <div class="item-info-product ">
                                <h4><a href="/hall/view/{{$searchHall->id}}">{{ $searchHall->hall_name }}</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">TK. {{ $searchHall->hall_booking_price }}</span>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <a href="/hall/view/{{$searchHall->id}}">
                                        <input type="submit" name="submit" value="View Details" class="button" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach()
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- //mens -->
@endsection()
