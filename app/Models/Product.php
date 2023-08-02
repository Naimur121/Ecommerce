<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    private static $data, $image, $imageNewName, $directory, $imgUrl;
    public static function addProduct($request)
    {

        if ($request->id) {
            self::$data = Product::find($request->id);
            if ($request->image) {
                if (file_exists(self::$data->image)) {
                    unlink(self::$data->image);
                }
                self::$data->image = self::getImgurl($request);
            } else {
                self::$data->image = self::$data->image;
            }
        } else {
            // $request->validate([
            //     'category_Name'=>'required',
            //     'description'=>'required',
            //     'image'=>'required',
            //     'styled_radio'=>'required',
            // ]);
            self::$data = new Product();
            self::$data->image = self::getImgurl($request);
        }
        self::$data->category_id = $request->category_id;
        self::$data->sub_category_id = $request->sub_category_id;
        self::$data->brand_id = $request->brand_id;
        self::$data->unit_id = $request->unit_id;
        self::$data->name = $request->product_name;
        self::$data->code = $request->product_code;
        self::$data->model = $request->product_model;
        self::$data->stock_amount = $request->product_amount;
        self::$data->regular_price = $request->product_price;
        self::$data->selling_price = $request->selling_price;
        self::$data->short_description = $request->short_description;
        self::$data->long_description = $request->long_description;
        self::$data->status = $request->styled_radio;
        self::$data->save();
        return self::$data;
    }
    public static function getImgurl($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = rand() . '.' . self::$image->Extension();
        self::$directory = 'admin/product-image/';
        self::$imgUrl = self::$directory . self::$imageNewName;
        self::$image->move(self::$directory, self::$imageNewName);
        return self::$imgUrl;
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function otherImage()
    {
        return $this->hasMany(OtherImage::class);
    }
    public static function delete_item($request)
    {
        self::$data = Product::find($request->id);
        if (self::$data->image) {
            if (file_exists(self::$data->image)) {
                unlink(self::$data->image);
            }
        }
        self::$data->delete();
    }
}
