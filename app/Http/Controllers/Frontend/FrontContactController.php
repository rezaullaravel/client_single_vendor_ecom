<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontContactController extends Controller
{
    //contact us page
    public function index(){
        return view('frontend.contact.index');
    }//end method


    //insert message
    public function insertMessage(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('message','Your message has been successfully sent.');
    }//end method
}//end main
