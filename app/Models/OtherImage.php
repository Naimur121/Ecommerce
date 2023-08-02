<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherImage extends Model
{
    use HasFactory;
    private static $data, $OtherImage, $image, $imageNewName, $directory, $imgUrl;
    public static function addOtherImage($images, $id)
    {
        foreach ($images as $image) {
            self::$data = new OtherImage();
            self::$data->product_id = $id;
            self::$data->image = self::getImgurl($image);
            self::$data->save();
        }
    }
    public static function updateImage($images, $id)
    {
        if ($images != null) {
            self::$OtherImage = OtherImage::where('product_id', $id)->get();
            foreach (self::$OtherImage as $image) {
                if (file_exists($image->image)) {
                    unlink($image->image);
                }
                $image->delete();
            }
            self::addOtherImage($images, $id);
        }
    }
    public static function getImgurl($image)
    {
        self::$imageNewName = rand() . '.' . $image->Extension();
        self::$directory = 'admin/product-otherImage-image/';
        self::$imgUrl = self::$directory . self::$imageNewName;
        $image->move(self::$directory, self::$imageNewName);
        return self::$imgUrl;
    }
    public static function delete_item($request){
        self::$OtherImage = OtherImage::where('product_id', $request->id)->get();
        foreach (self::$OtherImage as $image) {
            if (file_exists($image->image)) {
                unlink($image->image);
            }
            $image->delete();
        }
    }
}
