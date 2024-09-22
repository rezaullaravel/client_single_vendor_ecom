<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    //faq page
    public function index(){
        $faqs = Faq::orderBy('id','desc')->get();
        return view('frontend.faq.index',compact('faqs'));
    }//end method
}
