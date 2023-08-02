<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index');
    }
    public function addBrand( Request $request)
    {
        Brand::addBrand($request);
        if($request->id){
            alert()->success('Update Successfully.',);
        }else{
            alert()->success('Add Successfully.',);
        }
        return redirect()->route('brand.manage');
        // return back();
    }
    public function manage()
    {
        return view('admin.brand.manage',[
            'products'=>Brand::all()
        ]);
    }
    public static function edit(Request $request){
        return view('admin.brand.edit',[
            'products'=>Brand::find($request->id)
        ]);
    }
    public function delete( Request $request)
    {
        Brand::  delete_item($request);
        alert()->success('Successfully Delete',);
         return back();
    }
}
