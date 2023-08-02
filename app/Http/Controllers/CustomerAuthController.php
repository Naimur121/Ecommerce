<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Session;

class CustomerAuthController extends Controller
{
    private $customer;
    public function index() {
        return view('website.customer.index');
    }
    public function login(Request $request) {
        $this->customer = Customer::where('email',$request->email)->first();
        if($this->customer){
            if(password_verify($request->password,$this->customer->password)){
                Session::put('customer_id',$this->customer->id );
                Session::put('customer_name',$this->customer->name );
                return redirect('/customer-dashboard');

            }else{
                return back()->with('messege','Invalide Password');
            }

        }else{
            return back()->with('messege','Invalide Email');
        }
    }
    public function dashboard(){
        return view('website.customer.dashboard');
    }
    public function register() {
        return view('website.customer.register');
    }
    public function registerDone(Request $request) {
        // return $request;
        $this->validate($request,[
            'name'     =>'required',
            'email'    =>'required|unique:customers,email',
            'password'    =>'required',
            'mobile'   =>'required|unique:customers,mobile',
        ]);
       Customer::registerDone($request);
       return redirect('/customer-dashboard');
    }

    public function logout() {
        Session::forget('customer_id');
        Session::forget('customer_name');
        return redirect('/');
    }
     public function profile(){
        return view('website.customer.profile');
     }
}
