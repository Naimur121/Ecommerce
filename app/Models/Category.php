<?php

namespace App\Models;

use Illuminate\Auth\Events\Validated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $data, $image, $imageNewName, $directory, $imgUrl;
    public static function addCategory($request)
    {
        
        if($request->id){
        
            self::$data = Category::find($request->id);
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
                'category_Name'=>'required',
                'description'=>'required',
                'image'=>'required',
                'styled_radio'=>'required',
            ]);
            self::$data = new Category();
            self::$data->image = self::getImgurl($request);
        }
        self::$data->name = $request->category_Name;
        self::$data->description = $request->description;
        self::$data->status = $request->styled_radio;
        self::$data->save();
    }
    public static function getImgurl($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = rand() . '.' . self::$image->Extension();
        self::$directory = 'admin/category-image/';
        self::$imgUrl = self::$directory . self::$imageNewName;
        self::$image->move(self::$directory, self::$imageNewName);
        return self::$imgUrl;
    }
    public static function status($id){
        self::$data = Category::find($id);
        if (self::$data->status == 1){
            self::$data->status = 0;
        }else{
            self::$data->status = 1;
        }
        self::$data->save();

    }
    public static function delete_item($request){
        self::$data = Category::find($request->id);
        if (self::$data->image){
            if (file_exists(self::$data->image)){
                unlink(self::$data->image);
            }
        }
        self::$data->delete();
    }
    public function subCategory(){
        return $this->hasMany(SubCategory::class);
    }
}
