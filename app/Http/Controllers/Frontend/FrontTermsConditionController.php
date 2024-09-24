<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\TermsCondition;
use App\Http\Controllers\Controller;

class FrontTermsConditionController extends Controller
{
    public function index(){
        $data = TermsCondition::first();
        return view('frontend.pages.terms_conditons',compact('data'));
    }//end method
}
