<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ShoppingCart;

class OrderDetails extends Model
{
    use HasFactory;
    public static $data;
    public static function orderDetails($request,$id) {
        foreach(ShoppingCart::all() as $item){
            self::$data = new orderDetails();
            self::$data->order_id      = $id;
            self::$data->product_id    =$item->id;
            self::$data->product_name  =$item->name;
            self::$data->product_price =$item->price;
            self::$data->product_qty   =$item->qty;
            self::$data->save();
            ShoppingCart::remove($item->__raw_id);
        }
        
    }
}
