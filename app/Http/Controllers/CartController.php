<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use ShoppingCart;

class CartController extends Controller
{
    private $product;

    public function index(Request $request){
        $this->product= Product::find($request->id);
        // return $this->product;
       ShoppingCart ::add($this->product->id,$this->product->name,$request->qty,$this->product->selling_price,['image' => $this->product->image,'brand' => $this->product->brand->brand_name ] );
        return redirect('/show-cart');
    }
    public function show(){
        // return ShoppingCart::all();
        return view('website.cart.index',[
            'cart_products'=>ShoppingCart::all()
        ]);
    }
    public function remove($id){
        ShoppingCart::remove($id);
        return redirect('/show-cart');
    }
    public function update(Request $request,$id){
        ShoppingCart::update($id,$request->qty);
        return redirect('/show-cart');
    }
    
}
