@extends('front-end.master')

@section('title')

    Cart Show | Find Convention Hall

@endsection()

@section('body')
    <!-- Single Page -->
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <div class="checkout-right">
                <h3 class="text-center text-primary"> My Shopping Cart </h3><hr>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>booking_days</th>
                            <th>total_people</th> 
                            <th>order_date</th>
                            <th>seattype</th>
                            <th>shift</th>
                            <th>totalfood</th> 
                            <th>total cost</th> 
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @php($sum=0)
                        @foreach($cartHalls as $cartHall)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $cartHall->name }}</td>
                                <td><img src="{{ asset($cartHall->options->image) }}" alt="" width="80px" height="80px" /></td>
                                <td>Tk. {{ $cartHall->price }}</td>
                                <td>
                                    {{ Form::open(['url' => 'cart/update', 'method'=>'POST']) }}
                                    <input type="number" name="booking_days" value="{{ $cartHall->qty }}" min="1" />
                                    <input type="hidden" name="rowId" value="{{ $cartHall->rowId }}" />
                                    <input type="submit" class="btn btn-success" name="update" value="Update" />
                                    {{ Form::close() }}
                                </td>
                                <td>{{ $cartHall->total_people }}</td>
                                <td>{{ $cartHall->order_date }}</td>
                                <td>{{ $cartHall->seattype }}</td>
                                <td>{{ $cartHall->hall_shift }}</td>
                                <td>{{ $cartHall->totalfood }}</td>
                                <td>Tk. {{ $total =  $cartHall->price * $cartHall->qty }}</td>

                                <td>
                                    <a href="/cart/delete/{{$cartHall->rowId}}" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php $sum = $sum+$total ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-11 col-md-offset-1">
                    <table class="table table-bordered">
                        <tr>
                            <th>Item Total Price</th>
                            <td><span class="text-danger">Tk. {{ $sum }}</span></td>
                        </tr>
                        <tr>
                            <th>Item Vat Total</th>
                            <td><span class="text-danger">Tk. {{ $vat=($sum*3)/100 }}</span></td>
                        </tr>
                        <tr>
                            <th>Item Grand Total</th>
                            <td><span class="text-danger">Tk. {{ $orderTotal = $sum+$vat }}</span> </td>
                        </tr>
                        {{ Session::put(['orderTotal' => $orderTotal]) }}
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-11 col-md-offset-1">
                        @if(Session::get('customerId') && Session::get('shippingId'))
                            <a href="/checkout/payment" class="btn btn-success pull-right">Checkout</a>
                        @elseif(Session::get('customerId'))
                            <a href="/checkout/shipping" class="btn btn-success pull-right">Checkout</a>
                        @else
                            <a href="/checkout" class="btn btn-success pull-right">Checkout</a>
                        @endif
                        <a href="/" class="btn btn-success">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
