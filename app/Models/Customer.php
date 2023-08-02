<?php

namespace App\Models;

use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Customer extends Model
{
    use HasFactory;
    public static $data;
    public static function newCashOrder($request) {
        self::$data = new Customer();
        self::$data->name     = $request->name;
        self::$data->email    = $request->email;
        self::$data->mobile   = $request->mobile;
        self::$data->password = bcrypt($request->password);
        self::$data->save();

        Session::put('customer_id',self::$data->id );
        Session::put('customer_name',self::$data->name );
        
        return self::$data;
        
    }
    public static function registerDone($request) {
        self::$data = new Customer();
        self::$data->name     = $request->name;
        self::$data->email    = $request->email;
        self::$data->mobile   = $request->mobile;
        self::$data->password = bcrypt($request->password);
        self::$data->save();

        Session::put('customer_id',self::$data->id );
        Session::put('customer_name',self::$data->name ); 
        
    }
}
