<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Http\Controllers\Controller;

class PrivacyPolicyController extends Controller
{
    //privacy policy update form
    public function index(){
        $data = PrivacyPolicy::first();
        return view('admin.privacy_policy.index',compact('data'));
    }//end method


    //update privacy policy
    public function update(Request $request,$id){
        $request->validate([
            'policy'=>'required',
        ]);
        $data = PrivacyPolicy::find($id);
        $data->policy = $request->policy;
        $data->save();
        return redirect()->back()->with('message','Privacy & Policy Updated Successfully');
    }//end method
}
