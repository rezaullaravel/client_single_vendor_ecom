<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TermsCondition;
use App\Http\Controllers\Controller;

class TermsConditionController extends Controller
{
     //terms conditon update form
     public function index(){
        $data = TermsCondition::first();
        return view('admin.terms_condition.index',compact('data'));
    }//end method


    //update privacy policy
    public function update(Request $request,$id){
        $request->validate([
            'terms_conditions'=>'required',
        ]);
        $data = TermsCondition::find($id);
        $data->terms_conditions = $request->terms_conditions;
        $data->save();
        return redirect()->back()->with('message','Terms & Conditon Updated Successfully');
    }//end method
}
