<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Food;
use App\Models\Hall;
use App\Models\Order;
use Illuminate\Http\Request;
use Hash;
use Mail;
use Session;
use DB;


class CustomerController extends Controller
{
    public function customerSignin() {
        $categories = Category::where('publication_status', 1)->get();
        $halls = Hall::where('publication_status', 1)->get();
        return view('front-end.customer.customer-signin',[
            'categories' => $categories,
            'halls' => $halls
        ]);
    }
  


    public function customerSigninForm(Request $request) {
        $customer = Customer::where('email', $request->email)->first();
        $active_status = Customer::where('active_status', 0)->first();
        if(password_verify($request->password, $customer->password)) {
            if($active_status) {
                return redirect('/customer/signin')->with('message', 'Your account is currently block.! Please contact admin!');
            }
            else {
                Session::put('customerId', $customer->id);
                Session::put('customerName', $customer->first_name.' '.$customer->last_name);
                Session::put('customerEmail', $customer->email);
                Session::put('customerNumber', $customer->phone_number);
                Session::put('customerAddress', $customer->address);
                return redirect('/customer/dashboard');
            }
        }
        else {
            return redirect('/customer/signin')->with('message', 'Invalid Login Information..!');
        }
    }

    public function customerDashboard() {
        $customer = Customer::find(Session::get('customerId'));
        $categories = Category::where('publication_status', 1)->get();
        $halls = Hall::where('publication_status', 1)->get();
        $bookingInfos = DB::table('orders')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('order_details', 'order_details.order_id', '=', 'orders.id')
            ->join('payments', 'payments.order_id', '=', 'orders.id')
            ->select('orders.*', 'customers.*', 'order_details.*', 'payments.*')
            ->where('customers.id', $customer->id)->get();

        return view('front-end.customer.customer-dashboard',[
            'customer' => $customer,
            'categories' => $categories,
            'halls' => $halls,
            'bookingInfos' => $bookingInfos
        ]);
    }

    public function bookingCancelled($id) {
        $booking = Order::find($id);
        $booking->order_status = 'Cancelled';
        $booking->save();

        return redirect('/customer/dashboard')->with('message', 'Your Booking is Cancelled!');
    }

    public function customerProfile($id,$name) {
        $customer = Customer::find($id);
        $categories = Category::where('publication_status', 1)->get();
        $halls = Hall::where('publication_status', 1)->get();

        return view('front-end.customer.customer-profile',[
            'customer' => $customer,
            'categories' => $categories,
            'halls' => $halls
        ]);
    }

    protected function imageUploadCustomer($request) {
        $customerImage = $request->file('customer_image');
        $fileType = $customerImage->getClientOriginalExtension();
        $imageName = $request->customer_name.'.'.$fileType;
        $directory = 'customer-images/';
        $imageUrl = $directory.$imageName;
        $customerImage->move($directory,$imageName);
        //Image::make($hallImage)->resize('200', '200')->save($imageUrl);
        return $imageUrl;
    }

    public function imageSave(Request $request) {
        $customer = Customer::find($request->customer_id);
        $imageUrl = $this->imageUploadCustomer($request);
        $customer->customer_image = $imageUrl;
        $customer->save();

        return back()->with("message", "Your Image Successfully Added!");
    }

    public function customerEdit($id) {
        $customer = Customer::find($id);
        $categories = Category::where('publication_status', 1)->get();
        $halls = Hall::where('publication_status', 1)->get();
        return view('front-end.customer.customer-edit',[
            'customer' => $customer,
            'categories' => $categories,
            'halls' => $halls
        ]);
    }

    public function updateCustomerInfo($customer, $request, $imageUrl=null) {
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone_number = $request->phone_number;
        $customer->address = $request->address;
        if($imageUrl) {
            $customer->customer_image = $imageUrl;
        }
        $customer->save();
    }

    public function customerUpdate(Request $request) {
        $customerImage = $request->file('customer_image');
        $customer = Customer::find($request->customer_id);

        if($customerImage) {
            unlink($customer->customer_image);
            $imageUrl = $this->imageUploadCustomer($request);
            $this->updateCustomerInfo($customer, $request, $imageUrl);
        }
        else {
            $this->updateCustomerInfo($customer, $request);
        }

        return back()->with("message", "Customer Info Updated!");
    }

    public function passwordChange($id) {
        $customer = Customer::find($id);
        $categories = Category::where('publication_status', 1)->get();
        $halls = Hall::where('publication_status', 1)->get();

        return view('front-end.customer.password-change',[
            'customer' => $customer,
            'categories' => $categories,
            'halls' => $halls
        ]);
    }

    public function passwordUpdate(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'confirm_password' => 'required_with:new_password|same:new_password|min:6'
        ]);

        $customer = Customer::find($request->customer_id);

        if (!Hash::check($request->old_password, $customer->password)) {
            return back()->with('error', 'Old password does not match!');
        }

        $customer->password = Hash::make(bcrypt($request->new_password));
        $customer->save();

        return back()->with('message', 'Password Successfully Changed!');
    }

    public function customerCreate() {
        $categories = Category::where('publication_status', 1)->get();
        $halls = Hall::where('publication_status', 1)->get();
        return view('front-end.customer.customer-create',[
            'categories' => $categories,
            'halls' => $halls
        ]);
    }

    public function customerCreateForm(Request $request) {
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

    public function accountVerify(Request $request) {
        $customer  = Customer::where('confirmation_code', $request->confirmation_code)->first();
        if($customer) {
            $customer->active_status = 1;
            $customer->confirmation_code = null;
            $customer->save();
            return redirect('/customer/dashboard')->with('message', 'Your account is verified. Please login your account!');
        }
        else {
            return redirect('/registration/confirmation')->with('message', 'Confirmation Code Invalid...Please Try again..!');
        }
    }

    public function customerLogout() {
        Session::forget('customerId');
        Session::forget('customerName');
        Session::forget('customerEmail');
        Session::forget('customerNumber');
        Session::forget('customerAddress');
        return redirect('/');
    }
}
