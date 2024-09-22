<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminFaqController extends Controller
{
    //faq list
    public function index(){
        $faqs = Faq::orderBy('id','desc')->get();
        return view('admin.faq.index',compact('faqs'));
    }//end method


    //faq create
    public function create(){
        return view('admin.faq.create');
    }//end method

    //faq store
    public function store(Request $request){
        $request->validate([
            'question'=>'required',
            'answer'=>'required',
        ]);

        $faq = new Faq();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        return redirect()->route('admin.faq.index')->with('info','Faq Created Successfully');
    }//end method


    //faq edit
    public function edit($id){
        $faq = Faq::find($id);
        return view('admin.faq.edit',compact('faq'));
    }//end method

     //faq update
     public function update(Request $request,$id){
        $request->validate([
            'question'=>'required',
            'answer'=>'required',
        ]);

        $faq = Faq::find($id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        return redirect()->route('admin.faq.index')->with('info','Faq Updated Successfully');
    }//end method

     //faq delete
     public function delete($id){
         Faq::find($id)->delete();
         return redirect()->route('admin.faq.index')->with('info','Faq Deleted Successfully');
    }//end method
}
