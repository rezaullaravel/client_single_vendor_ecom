<?php

namespace App\Http\Controllers\Admin;

use App\Models\ShippingInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShippingInfoController extends Controller
{
    //returns refunds update form
    public function index(){
        $data = ShippingInfo::first();
        return view('admin.shipping_info.index',compact('data'));
    }//end method


    //update privacy policy
    public function update(Request $request,$id){
        $request->validate([
            'info'=>'required',
        ]);
        $data = ShippingInfo::find($id);
        $data->info = $request->info;
        $data->save();
        return redirect()->back()->with('message','Shipping Info Updated Successfully');
    }//end method
}
