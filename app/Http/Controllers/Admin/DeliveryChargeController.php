<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\DeliveryCharge;
use App\Http\Controllers\Controller;

class DeliveryChargeController extends Controller
{
    //deliver charge page
    public function index(){
     $delivery_charge = DeliveryCharge::first();
     return view('admin.delivery_charge.index',compact('delivery_charge'));
    }//end method


    //delivery charge update
    public function update(Request $request){
        $request->validate([
            'amount'=>'required',
        ]);

        $delivery_charge = DeliveryCharge::first();
        $delivery_charge->amount = $request->amount;
        $delivery_charge->save();

        return redirect()->back()->with('message','Delivery charge updated Successfully');
    }//end method
}
