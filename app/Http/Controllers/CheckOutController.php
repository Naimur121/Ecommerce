<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Session;

class CheckOutController extends Controller
{
    private $customer,$order;
    public function index(){
        if(Session::get('customer_id')){
            $this->customer = Customer:: find (Session::get('customer_id'));
        }
        else{
            $this->customer = ' ';
        }
        return view('website.checkout.index',[
            'customer'=>$this->customer
        ]);
    }
     public function newCashOrder(Request $request){
        if(Session::get('customer_id')){
            $this->customer = Customer:: find (Session::get('customer_id'));
        }
        else{
            $this->validate($request,[
                'name'     =>'required',
                'password'     =>'required',
                'email'    =>'required|unique:customers,email',
                'mobile'   =>'required|unique:customers,mobile',
                'delivery' =>'required'
            ]);
            $this->customer = Customer::newCashOrder($request);
        }
        $this->validate($request,[
            'delivery' =>'required'
        ]);
        $this->order    = Order::order($request,$this->customer->id);
        OrderDetails::orderDetails($request,$this->order->id);
        return redirect()->route('home');
     }
}
