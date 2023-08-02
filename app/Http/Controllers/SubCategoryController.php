<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('admin.sub-category.index',[
            'categories'=>Category::all()
        ]);
    }
    public function addSubCategory( Request $request)
    {
        SubCategory::addSubCategory($request);
        if($request->id){
            alert()->success('Update Successfully.');
        }else{
            alert()->success('Add Successfully.');
        }
        
        return redirect()->route('subCategory.manage');
        // return back();
    }
    public function manage()
    {
        return view('admin.sub-category.manage',[
            'products'=>SubCategory::all(),
            'categories'=>Category::all()
        ]);
    }
    public function delete( Request $request)
    {
        SubCategory::  delete_item($request);
        alert()->success('Successfully Delete',);
         return back();
    }
    public static function edit(Request $request){
        return view('admin.sub-category.edit',[
            'products'=>SubCategory::find($request->id),
            'categories'=>Category::all()
        ]);
    }
}

