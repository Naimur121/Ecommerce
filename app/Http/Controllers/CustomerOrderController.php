<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class CustomerOrderController extends Controller
{
    public function order(){
        return view('website.customer.order',[
            'order_all'=>Order::where('customer_id',Session::get('customer_id'))->get()
        ]);
    }
}
