<?php

namespace App\Http\Controllers\Frontend;

use Image;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    //user profile update
    public function updateProfile(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$id,
            'phone'=>'required|unique:users,phone,'.$id,
        ]);

        $user = User::find($id);
         //image upload
         if($request->file('image')){

            if(File::exists($user->image)){
                unlink($user->image);
            }
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalName();
            Image::make($image)->resize(400,400)->save('upload/user_images/'.$imageName);
            $image_path = 'upload/user_images/'.$imageName;
        }


        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->address){
            $user->address = $request->address;
        }
        if($request->image){
            $user->image = $image_path;
        }
        $user->save();
        return redirect()->back()->with('message','Profile Updated Successfully');
    }//end method


    //user password update form
    public function userPassword(){
        $user = Auth::user();
        return view('frontend.user.password_update',compact('user'));
    }//end method

    //user password update
    public function userPasswordUpdate(Request $request,$id){
        $request->validate([
            'current_password'=>'required|string',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string',
        ],[
            'password'=>'The new password field is required.'
        ]);

        $user = User::findOrFail($id);

          // Check if the provided current password matches the stored password
          if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password does not match.']);
        }

         // Update the user's password
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('message', 'Password updated successfully.');

    }//end method

}
