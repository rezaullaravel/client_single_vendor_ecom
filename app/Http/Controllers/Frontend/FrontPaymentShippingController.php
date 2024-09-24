<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ShippingInfo;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Controllers\Controller;

class FrontPaymentShippingController extends Controller
{
    public function pmethod(){
        $data = PaymentMethod::first();
        return view('frontend.pages.payment_method',compact('data'));
    }//end method


    public function sinfo(){
        $data = ShippingInfo::first();
        return view('frontend.pages.shipping_info',compact('data'));
    }//end method
}
