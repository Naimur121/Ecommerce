<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    private static $data, $image, $imageNewName, $directory, $imgUrl;
    public static function addUnit($request)
    {
        
        if($request->id){
        
            self::$data = Unit::find($request->id);
            if($request->image){
                if (file_exists(self::$data->image)){
                    unlink(self::$data->image);
                }
                self::$data->image = self::getImgurl($request);
            }else{
                self::$data->image = self::$data->image;
            }
        }
        else{
            $request->validate([
                'unit_name'=>'required',
                'unit_code'=>'required',
                'description'=>'required',
                'image'=>'required',
                'styled_radio'=>'required',
            ]);
            self::$data = new Unit();
            self::$data->image = self::getImgurl($request);
        }
        self::$data->unit_name = $request->unit_name;
        self::$data->unit_code = $request->unit_code;
        self::$data->description = $request->description;
        self::$data->status = $request->styled_radio;
        self::$data->save();
    }
    public static function getImgurl($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = rand() . '.' . self::$image->Extension();
        self::$directory = 'admin/unit-image/';
        self::$imgUrl = self::$directory . self::$imageNewName;
        self::$image->move(self::$directory, self::$imageNewName);
        return self::$imgUrl;
    }
    public static function delete_item($request){
        self::$data = Unit::find($request->id);
        if (self::$data->image){
            if (file_exists(self::$data->image)){
                unlink(self::$data->image);
            }
        }
        self::$data->delete();
    }
}
