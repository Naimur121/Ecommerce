<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;
    public function index()
    {
        return view('admin.product.index', [
            'categories' => Category::all(),
            'sub_categories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all()

        ]);
    }
    public function subcategoryByCategory()
    {
        return response()->json(SubCategory::where('category_id', $_GET['id'])->get());
    }
    public function addProduct(Request $request)
    {
        $this->product = Product::addProduct($request);
        if ($request->id) {
            OtherImage::updateImage($request->other_image, $this->product->id);
        } else {
            OtherImage::addOtherImage($request->other_image, $this->product->id);
        }

        if ($request->id) {
            alert()->success('Update Successfully.',);
        } else {
            alert()->success('Add Successfully.',);
        }
        return redirect()->route('dashboard');
        // return back();
    }
    public function manage()
    {
        return view('admin.product.manage', [
            'products' => Product::all()
        ]);
    }
    public function edit(Request  $request)
    {
        return view('admin.product.edit', [
            'product' => Product::find($request->id),
            'categories' => Category::all(),
            'sub_categories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all()

        ]);
    }
    public function details(Request $request)
    {
        return view('admin.product.details', [
            'product' => Product::find($request->id)
        ]);
    }
    public function details_item(Request $request){
        OtherImage::delete_item($request);
        Product::  delete_item($request);
        alert()->success('Successfully Delete');
        return redirect()->route('dashboard');
    }
}
