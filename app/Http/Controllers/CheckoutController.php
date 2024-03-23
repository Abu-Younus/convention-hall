<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Hall;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Mail;
use Session;
use Cart;

class CheckoutController extends Controller
{
    public function checkout() {
        $categories = Category::where('publication_status', 1)->get();
        $halls = Hall::where('publication_status', 1)->get();
        return view('front-end.checkout.checkout-content',[
            'categories' => $categories,
            'halls' => $halls
        ]);
    }

    public function customerSignup(Request $request) {
        $this->validate($request, [
            'first_name' => 'required|Regex:/^[\D]+$/i|min:2|max:15',
            'last_name' => 'required|Regex:/^[\D]+$/i|min:4|max:15',
            'phone_number' => 'required|min:11|numeric',
            'address' => 'required|min:15|max:100',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);

        $customer = new Customer();

        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->confirm_password = bcrypt($request->confirm_password);
        $customer->phone_number = $request->phone_number;
        $customer->address = $request->address;
        $customer->confirmation_code = rand(1111,9999);

        $customer->save();

        $data = $customer->toArray();

        //    Nexmo::message()->send([
        //        'to'   => '+88'.$customer->phone_number,
        //        'from' => '01647447774',
        //        'text' => 'Smart Shoppy verify code is : '.$customer->confirmation_code
        //    ]);

        Mail::send('front-end.mail.confirmation-mail', $data, function ($message) use ($data){
            $message->to($data['email']);
            $message->subject('Confirmation mail');
        });


        return redirect('/registration/confirmation');
    }

    public function registrationConfirmation() {
        $categories = Category::where('publication_status', 1)->get();
        $halls = Hall::where('publication_status', 1)->get();
        return view('front-end.checkout.confirmation-code',[
            'categories'    =>  $categories,
            'halls'  =>  $halls
        ]);
    }

    public function resendCode($id) {
        $customer = Customer::find($id);

        if ($customer->confirmation_code != null && $customer->active_status == 0) {
            $customer->confirmation_code = rand(1111,9999);
        }
        $customer->save();

        return redirect('registration/confirmation')->with('message', 'Confirmation code resend successfully!');
    }

    public function accountVerify(Request $request) {
        $customer  = Customer::where('confirmation_code', $request->confirmation_code)->first();
        if($customer) {
            $customer->active_status = 1;
            $customer->confirmation_code = null;
            $customer->save();
            return redirect('/checkout')->with('message', 'Your account is verified. Please login your account!');
        }
        else {
            return redirect('/registration/confirmation')->with('message', 'Confirmation Code Invalid...Please Try again..!');
        }
    }

    public function customerLogin(Request $request) {
        $customer = Customer::where('email', $request->email)->first();
        $active_status = Customer::where('active_status', 0)->first();
        if(password_verify($request->password, $customer->password)) {
            if($active_status) {
                return redirect('/registration/confirmation')->with('message', 'Please your account is verify and then login..!');
            }
            else {
                Session::put('customerId', $customer->id);
                Session::put('customerName', $customer->first_name.' '.$customer->last_name);
                Session::put('customerEmail', $customer->email);
                Session::put('customerNumber', $customer->phone_number);
                Session::put('customerAddress', $customer->address);
                return redirect('/checkout/shipping');
            }
        }
        else {
            return redirect('/checkout')->with('message', 'Invalid Password..!');
        }
    }

    public function checkoutShipping() {
        $categories = Category::where('publication_status', 1)->get();
        $halls = Hall::where('publication_status', 1)->get();
        $customer = Customer::find(Session::get('customerId'));
        return view('front-end.checkout.checkout-shipping', [
            'categories'    => $categories,
            'halls'  =>  $halls,
            'customer'  => $customer
        ]);
    }

    public function shippingSave(Request $request) {
        $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email = $request->email;
        $shipping->phone_number = $request->phone_number;
        $shipping->city = $request->city;
        $shipping->post_code = $request->post_code;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shippingId', $shipping->id);
        Session::put('shippingName', $shipping->full_name);
        Session::put('shippingEmail', $shipping->email);
        Session::put('shippingNumber', $shipping->phone_number);
        Session::put('shippingCity', $shipping->city);
        Session::put('shippingPostCode', $shipping->post_code);
        Session::put('shippingAddress', $shipping->address);
        return redirect('/checkout/payment');
    }

    public function checkoutPayment() {
        $categories = Category::where('publication_status', 1)->get();
        $halls = Hall::where('publication_status', 1)->get();
        return view('front-end.checkout.checkout-payment',[
            'categories' => $categories,
            'halls' => $halls
        ]);
    }

    public function newOrder(Request $request) {
        $paymentType = $request->payment_type;
        if ($paymentType == 'cash') {
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Session::get('orderTotal');
            $order->save();

            Session::put('bookingDate',$order->created_at);

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $paymentType;
            $payment->save();

            Session::put('paymentType',$payment->payment_type);

            $cartHalls = Cart::Content();
            foreach ($cartHalls as $cartHall) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->hall_id = $cartHall->id;
                $orderDetail->hall_name = $cartHall->name;
                $orderDetail->hall_image = $cartHall->options->image;
                $orderDetail->hall_price = $cartHall->price;
                $orderDetail->booking_days = $cartHall->qty;
                $orderDetail->order_date = $cartHall->order_date;
                $orderDetail->total_people = $cartHall->total_people;
                $orderDetail->hall_shift = $cartHall->hall_shift;
                $orderDetail->food_list = $cartHall->totalfood;
                $orderDetail->seat_type = $cartHall->seattype;
                $orderDetail->save();
            }

            $hallInfo = $orderDetail->toArray();
            Mail::send('front-end.mail.order-mail', $hallInfo, function ($message) use ($hallInfo) {
                $message->to(Session::get('customerEmail'));
                 $message->subject('Orders Mail');
            });
            Cart::destroy();
            return redirect('/complete/order');

        } else if ($paymentType == 'ssl_commerz') {
            return view('front-end.checkout.ssl-commerz');
        }
    }

    public function completeOrder() {
        $categories = Category::where('publication_status', 1)->get();
        $halls = Hall::where('publication_status', 1)->get();
        return view('front-end.checkout.complete-order',[
            'categories' => $categories,
            'halls' => $halls
        ]);
    }
}
