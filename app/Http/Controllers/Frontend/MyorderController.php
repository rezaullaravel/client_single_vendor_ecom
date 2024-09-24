<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MyorderController extends Controller
{
    //customer order list
    public function  index(){
        $myOrders = Order::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('frontend.user.my_order.index',compact('myOrders'));
    }//end method


    //order details
    public function orderDetails($id){
        $order = Order::find($id);
        return view('frontend.user.my_order.details',compact('order'));
    }//end method
}//end main
