<?php

namespace App\Models;

use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;


class Order extends Model
{
    use HasFactory;
    public static $data;
    
    public static function order($request,$id) {
        self::$data = new Order();
        self::$data->customer_id       = $id;
        self::$data->order_date        = date('Y-m-d');
        self::$data->order_timestamp   = strtotime(date('Y-m-d'));
        self::$data->order_total       = session::get('order_total');
        self::$data->tax_total         = Session::get('tax_total');
        self::$data->shipping_total    = Session::get('shipping_total');
        self::$data->delivery_address  = $request->delivery;
        self::$data->payment_type      = $request->payment_type;
        self::$data->save();
        return self::$data; 
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
