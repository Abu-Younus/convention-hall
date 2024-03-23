<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\OrderDetail;
use App\Models\Hall;
use DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //

    public function viewreport() {
        $OrderDetails = DB::table('OrderDetail')->get();
        return view('admin.foods.viewreport-foods',[
            'OrderDetails' => $OrderDetails
        ]);
    }
    
}
