<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Hall;
use App\Models\Seats;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request) {
        $hall = Hall::find($request->id);
        $seat = Seats::where('id', $request->seattype)->select('seat_name');
        $totalfood = $request->totalfood; 
        $totalfood = implode(',', $totalfood);
        Cart::add([
            'hall_shift' => $request->hall_shift, 
            'id'    => $request->id,
            'name'  => $hall->hall_name,
            'price' => $hall->hall_booking_price,
            'qty' => $request->qty,
            'booking_days' => $request->booking_days,
            'total_people' => $request->total_people,
            'order_date' => $request->order_date,
            'seattype' =>  $request->seattype,
            'totalfood' => $totalfood,
             
            'weight' => 1,
            'options' => [
                'image' => $hall->hall_image,
            ],
        ]); 
        return redirect('/cart/show');
    }
    public function showCart() {
        $categories = Category::where('publication_status', 1)->get();
        $halls = Hall::where('publication_status', 1)->get();
        $cartHalls = Cart::Content();
        return view('front-end.cart.show-cart', [
            'categories' => $categories,
            'halls'  =>  $halls,
            'cartHalls' => $cartHalls
        ]);
    }

    public function deleteCart($id) {
        Cart::remove($id);

        return redirect('/cart/show');
    }

    public function updateCart(Request $request) {
        Cart::update($request->rowId, [
            'qty' => $request->booking_days,
        ]);

        return redirect('/cart/show');
    }


}
