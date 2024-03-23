@extends('front-end.master')

@section('title')

    Home | Find Convention Hall

@endsection

@section('body')

    <!-- /add slider -->
    @include('front-end.includes.add-slider')
    <!-- //add slider -->
    <!-- /new_arrivals -->
    <div class="new_arrivals_agile_w3ls_info">
        <div class="container">
            <h3 class="wthree_text_info">New <span>Arrivals</span></h3>
            <div id="horizontalTab">
                <div class="w3_agile_latest_arrivals">
                    @foreach($newHalls as $newHall)
                        <div class="col-md-3 product-men single">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="{{ asset($newHall->hall_image) }}" alt="" class="pro-image-front">
                                    <img src="{{ asset($newHall->hall_image) }}" alt="" class="pro-image-back">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="/hall/view/{{$newHall->id}}" class="link-product-add-cart">Quick View</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">New</span>

                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="/hall/view/{{$newHall->id}}">{{ $newHall->hall_name }}</a></h4>
                                    <div class="info-product-price">
                                        <span class="item_price">TK. {{ $newHall->hall_booking_price }}</span>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                        <a href="/hall/view/{{$newHall->id}}">
                                            <input type="submit" class="button" name="btn" value="View Details" />
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach()
                    <div class="clearfix"> </div>
                    <!--//slider_owl-->
                </div>
            </div>
        </div>
    </div>
    <!-- //new_arrivals -->
    <div class="new_arrivals_agile_w3ls_info">
        <div class="container">
            <h3 class="wthree_text_info">Featured <span>Arrivals</span></h3>
            <div id="horizontalTab">
                <div class="w3_agile_latest_arrivals">
                    @foreach($featuredHalls as $featuredHall)
                        <div class="col-md-3 product-men single">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="{{ asset($featuredHall->hall_image) }}" alt="" class="pro-image-front">
                                    <img src="{{ asset($featuredHall->hall_image) }}" alt="" class="pro-image-back">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="/hall/view/{{$featuredHall->id}}" class="link-product-add-cart">Quick View</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">New</span>

                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="/hall/view/{{$featuredHall->id}}">{{ $featuredHall->hall_name }}</a></h4>
                                    <div class="info-product-price">
                                        <span class="item_price">TK. {{ $featuredHall->hall_booking_price }}</span>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                        <a href="/hall/view/{{$featuredHall->id}}">
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
    </div>

@endsection

