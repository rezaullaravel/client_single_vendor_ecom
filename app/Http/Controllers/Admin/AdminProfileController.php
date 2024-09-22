<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    //admin profile page
    public function index(){
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.index',compact('admin'));
    }//end method


    //admin profile update
    public function adminProfileUpdate(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
        ]);

        $admin = Admin::find($id);
         //image upload
         if($request->file('image')){

            if(File::exists($admin->image)){
                unlink($admin->image);
            }
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalName();
            Image::make($image)->resize(400,400)->save('upload/admin_images/'.$imageName);
            $image_path = 'upload/admin_images/'.$imageName;
        }


        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        if($request->image){
            $admin->image = $image_path;
        }
        $admin->save();
        return redirect()->back()->with('message','Profile Updated Successfully');
    }//end method


    //admin password change form
    public function passwordChangeForm(){
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.password_change',compact('admin'));
    }//end method

    //admin update password
    public function passwordUpdate(Request $request,$id){
        $request->validate([
            'current_password'=>'required|string',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string',
        ],[
            'password'=>'The new password field is required.'
        ]);

        $admin = Admin::findOrFail($id);

          // Check if the provided current password matches the stored password
          if (!Hash::check($request->current_password, $admin->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password does not match.']);
        }

         // Update the user's password
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect()->back()->with('message', 'Password updated successfully.');

    }//end method
}
