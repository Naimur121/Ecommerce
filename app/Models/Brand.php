<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    private static $data, $image, $imageNewName, $directory, $imgUrl;
    public static function addBrand($request)
    {
        
        if($request->id){
        
            self::$data = Brand::find($request->id);
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
                'brand_Name'=>'required',
                'description'=>'required',
                'image'=>'required',
                'styled_radio'=>'required',
            ]);
            self::$data = new Brand();
            self::$data->image = self::getImgurl($request);
        }
        self::$data->brand_name = $request->brand_Name;
        self::$data->description = $request->description;
        self::$data->status = $request->styled_radio;
        self::$data->save();
    }
    public static function getImgurl($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = rand() . '.' . self::$image->Extension();
        self::$directory = 'admin/brand-image/';
        self::$imgUrl = self::$directory . self::$imageNewName;
        self::$image->move(self::$directory, self::$imageNewName);
        return self::$imgUrl;
    }
    public static function delete_item($request){
        self::$data = Brand::find($request->id);
        if (self::$data->image){
            if (file_exists(self::$data->image)){
                unlink(self::$data->image);
            }
        }
        self::$data->delete();
    }
}
