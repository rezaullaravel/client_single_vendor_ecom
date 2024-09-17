<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    //add brand
    public function add(){
        return view('admin.brand.brand_add');
    }//end method


    //store brand
    public function store(Request $request){
        $request->validate([
            'brand_name'=>'required|unique:brands',
        ],[
            'brand_name.required'=>'Brand name can not be empty'
        ]);

        //image upload
        if($request->file('brand_logo')){
            $image = $request->file('brand_logo');
            $imageName = rand().'.'.$image->getClientOriginalName();
            Image::make($image)->resize(240,142)->save('upload/brand_images/'.$imageName);
            $image_path = 'upload/brand_images/'.$imageName;
        }

        //brand insert
        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_logo' => $request->file('brand_logo') ?  $image_path: NULL,
        ]);

        return redirect()->back()->with('message','Brand created successfully');
    }//end method


    //brand manage
    public function manage(){
        $brands = Brand::all();
        return view('admin.brand.index',compact('brands'));
    }//end method


    //brand edit
    public function edit($id){
        $brand = Brand::find($id);
        return view('admin.brand.edit',compact('brand'));
    }//end method


    //brand update
    public function update(Request $request){
        $request->validate([
            'brand_name'=>'required|unique:brands,brand_name,'.$request->id,
        ],[
            'brand_name.required'=>'Brand name can not be empty'
        ]);

        $brand = Brand::find($request->id);

        //image upload
        if($request->file('brand_logo')){
            if(File::exists($brand->brand_logo)){
                unlink($brand->brand_logo);
            }
            $image = $request->file('brand_logo');
            $imageName = rand().'.'.$image->getClientOriginalName();
            Image::make($image)->resize(240,142)->save('upload/brand_images/'.$imageName);
            $image_path = 'upload/brand_images/'.$imageName;
            $brand->brand_logo = $image_path;
        }

        $brand->update([
            'brand_name' => $request->brand_name,
        ]);

        return redirect('/admin/brand/manage')->with('message','Brand updated successfully');
    }//end method


    //brand delete
    public function delete($id){
        $brand = Brand::find($id);
        if(File::exists($brand->brand_logo)){
            unlink($brand->brand_logo);
        }

        $brand->delete();
        return redirect('/admin/brand/manage')->with('message','Brand deleted successfully');
    }
}//end class
