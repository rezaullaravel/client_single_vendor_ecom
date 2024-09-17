<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderTrackingController extends Controller
{
    //order tracking form
    public function index(){
        return view('frontend.order_tracking.index');
    }//end method


    //fetch order
    public function fetchOrder(Request $request){
        $request->validate([
            'order_id_no'=>'required'
        ],[
            'order_id_no.required'=>'The order id field is required.'
        ]);

        $order = Order::where('order_id_no',$request->order_id_no)->first();

        if($order){
            return view('frontend.order_tracking.show_order',compact('order'));
        } else {
            return redirect()->back()->with('error-message','Order not found....');
        }
    }//end method
}//end main
