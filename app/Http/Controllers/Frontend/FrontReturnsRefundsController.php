<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\ReturnsRefunds;
use App\Http\Controllers\Controller;

class FrontReturnsRefundsController extends Controller
{
    public function index(){
        $data = ReturnsRefunds::first();
        return view('frontend.pages.returns_refunds',compact('data'));
    }//end method
}
