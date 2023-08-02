<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


use function GuzzleHttp\Promise\all;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }
    public function manage()
    {
        return view('admin.category.manage',[
            'products'=>Category::all()
        ]);
    }

    public function addCategory( Request $request)
    {
        Category::addCategory($request);
        if($request->id){
            alert()->success('Update Successfully.');
        }else{
            alert()->success('Add Successfully.');
        }
        
        return redirect()->route('category.manage');
        // return back();
    }
    
    public function status( $request)
    {
        Category::status($request);
        alert()->success('Status Change ',);
         return back();
    }
    public function delete( Request $request)
    {
        Category::  delete_item($request);
        alert()->success('Successfully Delete');
        return back();
    }
    public static function edit(Request $request){
        return view('admin.category.edit',[
            'products'=>Category::find($request->id)
        ]);
    }
}