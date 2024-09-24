<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReturnsRefunds;
class ReturnRefundsController extends Controller
{
    //returns refunds update form
    public function index(){
        $data = ReturnsRefunds::first();
        return view('admin.returns_refunds.index',compact('data'));
    }//end method


    //update privacy policy
    public function update(Request $request,$id){
        $request->validate([
            'returns_refunds'=>'required',
        ]);
        $data = ReturnsRefunds::find($id);
        $data->returns_refunds = $request->returns_refunds;
        $data->save();
        return redirect()->back()->with('message','Returns And Refunds Updated Successfully');
    }//end method
}
