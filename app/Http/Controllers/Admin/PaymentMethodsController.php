<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Controllers\Controller;

class PaymentMethodsController extends Controller
{
     //returns refunds update form
     public function index(){
        $data = PaymentMethod::first();
        return view('admin.payment_method.index',compact('data'));
    }//end method


    //update privacy policy
    public function update(Request $request,$id){
        $request->validate([
            'payment_method'=>'required',
        ]);
        $data = PaymentMethod::find($id);
        $data->payment_method = $request->payment_method;
        $data->save();
        return redirect()->back()->with('message','Payment Method Updated Successfully');
    }//end method
}
