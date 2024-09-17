<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    //add slider
    public function add(){
        return view('admin.slider.slider_add');
    }//end method


    //store slider
    public function store(Request $request){
          $slider = new Slider();

           //image upload
        if($request->file('image')){
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalName();
            Image::make($image)->resize(1600,450)->save('upload/slider_images/'.$imageName);
            $image_path = 'upload/slider_images/'.$imageName;
        }

        //data insert
        $slider->title = $request->title;
        $slider->image = $image_path;
        $slider->save();
        return redirect()->back()->with('message','Slider created successfully');
    }//end method


    //manage slider
    public function manage(){
        $sliders = Slider::orderBy('id','desc')->get();
        return view('admin.slider.slider_manage',compact('sliders'));
    }//end method


    //slider edit
    public function edit($id){
        $slider = Slider::find($id);
        return view('admin.slider.slider_edit',compact('slider'));
    }//end method


    //slider update
    public function update(Request $request){
        $id = $request->id;
        $slider = Slider::find($id);

        //image upload
        if($request->file('image')){
           if(File::exists($slider->image)){
            unlink($slider->image);
           }
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalName();
            Image::make($image)->resize(1600,450)->save('upload/slider_images/'.$imageName);
            $image_path = 'upload/slider_images/'.$imageName;
            $slider->image = $image_path;
        }

        //data update
        $slider->title = $request->title;
        $slider->save();
        return redirect()->route('admin.slider.manage')->with('message','Slider updated successfully');
    }//end method


    //slider delete
    public function delete($id){
        $slider = Slider::find($id);
        if(File::exists($slider->image)){
            unlink($slider->image);
           }

           $slider->delete();
           return redirect()->back()->with('message','Slider deleted successfully');
    }//end method




}//end main
