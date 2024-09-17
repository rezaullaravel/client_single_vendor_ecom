<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    //coupon list
    public function index(){
        $coupons = Coupon::all();
        return view('admin.coupon.index',compact('coupons'));
    }//end method


    //add
    public function add(){
        return view('admin.coupon.add');
    }//end method


    //store
    public function store(Request $request){
        $this->validate($request,[
            'amount'=>'required',
            'coupon_code'=>'unique:coupons'
        ]);

        //data insert
        Coupon::insert([
            'coupon_code' => $request->coupon_code,
            'type' => $request->type,
            'amount' => $request->amount,
            'status' => $request->status,
            'valid_date' => date('Y-m-d',strtotime($request->valid_date)),
        ]);

        return redirect()->back()->with('message','coupon  created successfully');
    }//end method


    //edit
    public function edit($id){
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit',compact('coupon'));
    }//end method


    //update
    public function update(Request $request){
        $this->validate($request,[
            'amount'=>'required',
            'coupon_code'=>'unique:coupons,coupon_code,'.$request->id,
        ]);

        //data update
        $coupon = Coupon::find($request->id)->update([
            'coupon_code' => $request->coupon_code,
            'type' => $request->type,
            'amount' => $request->amount,
            'status' => $request->status,
            'valid_date' => date('Y-m-d',strtotime($request->valid_date)),
        ]);

        return redirect('/admin/coupon')->with('message','coupon  updated successfully');
    }//end method


    //trash
    public function trash($id){
        $coupon = Coupon::find($id)->delete();
        return redirect('/admin/coupon')->with('message','coupon  deleted successfully');
    }//end method
}
