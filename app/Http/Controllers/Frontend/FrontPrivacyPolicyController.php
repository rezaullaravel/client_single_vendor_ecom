<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Http\Controllers\Controller;

class FrontPrivacyPolicyController extends Controller
{
    //privacy policy page
    public function index(){
        $data = PrivacyPolicy::first();
        return view('frontend.pages.privacy_policy',compact('data'));
    }//end method
}
