<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    //color list
    public function index(){
        $colors = Color::orderBy('id','desc')->get();
        return view('admin.color.index',compact('colors'));
    }//end method


    //color add form
    public function add(){
        return view('admin.color.add');
    }//end method


    //color store
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'code'=>'required'
        ]);

        $color = new Color();
        $color->name = $request->name;
        $color->code = $request->code;
        $color->save();
        return redirect()->route('admin.color.list')->with('message','Color Added Successfully');
    }//end method


    //color edit
    public function edit($id){
        $color = Color::find($id);
        return view('admin.color.edit',compact('color'));
    }//end method


    //color update
    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'code'=>'required'
        ]);

        $color = Color::find($id);
        $color->name = $request->name;
        $color->code = $request->code;
        $color->save();
        return redirect()->route('admin.color.list')->with('message','Color Updated Successfully');
    }//end method


    //color delete
    public function delete($id){
        Color::find($id)->delete();
        return redirect()->route('admin.color.list')->with('message','Color Deleted Successfully');
    }//end method
}//end main
