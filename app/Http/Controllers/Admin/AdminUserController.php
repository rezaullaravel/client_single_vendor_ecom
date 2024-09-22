<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    //user list
    public function index(){
        $users = User::orderBy('id','desc')->get();
        return view('admin.user.index',compact('users'));
    }//end method


    //user create form
    public function create(){
        return view('admin.user.create');
    }//end method

    //user store
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|string|min:8',
            'phone'=>'required|unique:users',
            'image'=>'image',
        ]);

         //image upload
         if($request->file('image')){
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalName();
            Image::make($image)->resize(400,400)->save('upload/user_images/'.$imageName);
            $image_path = 'upload/user_images/'.$imageName;
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        if(!empty($request->image)){
            $user->image = $image_path;
        }
        if(!empty($request->address)){
            $user->address = $request->address;
        }
        $user->save();
        return redirect()->route('admin.user.index')->with('message','User Created Successfully');
    }//end method

    //user edit form
    public function edit($id){
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }//end method

    //user update
    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'phone'=>'required|unique:users,phone,'.$id,
            'image'=>'image',
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
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->phone = $request->phone;
        if(!empty($request->image)){
            $user->image = $image_path;
        }
        if(!empty($request->address)){
            $user->address = $request->address;
        }
        $user->save();
        return redirect()->route('admin.user.index')->with('message','User Updated Successfully');
    }//end method

    //user delete
    public function delete($id){
        $user = User::find($id);
        if(File::exists($user->image)){
            unlink($user->image);
        }
        $user->delete();
        return redirect()->route('admin.user.index')->with('message','User Deleted Successfully');
    }//end method
}
