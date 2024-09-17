<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Image;

class AboutUsController extends Controller
{
    //about us page
    public function index(){
        $aboutus = AboutUs::first();
        return view('admin.about_us.index',compact('aboutus'));
    }//end method


    //about us update
    public function update(Request $request){
        $request->validate([
            'image'=>'image',
            'description'=>'required',
        ]);

        $aboutus = AboutUs::first();

         //image upload
         if($request->file('image')){
            if(File::exists($aboutus->image)){
                unlink($aboutus->image);
            }
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalName();
            Image::make($image)->resize(800,800)->save('upload/about_us_image/'.$imageName);
            $image_path = 'upload/about_us_image/'.$imageName;
            $aboutus->image = $image_path;
        }

        $aboutus->description = $request->description;
        $aboutus->save();

        return redirect()->back()->with('message','About us info updated successfully');
    }//end method
}//end main
