<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Hall;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function ajaxEmailCheck($email) {
        $customer = Customer::where('email', $email)->first();
        if($customer) {
            echo 'Already Exist';
        }
        else {
            echo 'Available';
        }
    }

    public function ajaxSearchCheck($id) {
        $searchHall = Hall::where('hall_name', $id)->get();
        if($searchHall) {
            echo $searchHall->hall_name;
        }
        else {
            echo 'this hall not available here';
        }
    }
}
