<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Mail;

class CustomerManageController extends Controller
{
    public function manageCustomer() {
        $customers = Customer::all();
        return view('admin.customer.manage-customer',[
            'customers' => $customers
        ]);
    }

    public function blockedCustomer($id) {
        $customer = Customer::find($id);
        $customer->active_status = 0;
        $customer->save();

        $data = $customer->toArray();

        Mail::send('admin.mail.blocked-mail', $data, function ($message) use ($data){
            $message->to($data['email']);
            $message->subject('Account Blocked mail');
        });

        return redirect('/manage/customer')->with('messages', 'This customer account is Blocked!');
    }

    public function activeCustomer($id) {
        $customer = Customer::find($id);
        $customer->active_status = 1;
        $customer->save();

        $data = $customer->toArray();

        Mail::send('admin.mail.active-mail', $data, function ($message) use ($data){
            $message->to($data['email']);
            $message->subject('Account Activated mail');
        });

        return redirect('/manage/customer')->with('message', 'This customer account is Activated!');
    }
}
