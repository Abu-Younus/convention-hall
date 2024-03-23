@extends('front-end.master')

@section('title')
    Category Halls | Find Convention Hall
@endsection()

@section('body')

    <div class="page-head_agile_info_w3l">
        <div class="container">
            <div class="col-md-12 products-right">
                <h5 class="text-center">Category Halls ({{$category->category_name}})</h5>
                <hr>
                <div class="single-pro" id="category_product">
                    @foreach($categoryHalls as $categoryHall)
                        <div class="col-md-3 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="{{ asset($categoryHall->hall_image) }}" alt="" class="pro-image-front">
                                    <img src="{{ asset($categoryHall->hall_image) }}" alt="" class="pro-image-back">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="/hall/view/{{$categoryHall->id}}" class="link-product-add-cart">Quick View</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">New</span>
                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="">{{ $categoryHall->hall_name }}</a></h4>
                                    <div class="info-product-price">
                                        <span class="item_price">TK. {{ $categoryHall->hall_booking_price }}</span>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                        <a href="/hall/view/{{$categoryHall->id}}">
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
@endsection()
