<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        return view('admin.unit.index');
    }
    public function addUnit( Request $request)
    {
        Unit::addUnit($request);
        if($request->id){
            alert()->success('Update Successfully.',);
        }else{
            alert()->success('Add Successfully.',);
        }
        return redirect()->route('unit.manage');

    }
    public function manage()
    {
        return view('admin.unit.manage',[
            'products'=>Unit::all()
        ]);
    }
    public static function edit(Request $request){
        return view('admin.unit.edit',[
            'products'=>Unit::find($request->id)
        ]);
    }
    public function delete( Request $request)
    {
        Unit::  delete_item($request);
        alert()->success('Successfully Delete',);
         return back();
    }
}
