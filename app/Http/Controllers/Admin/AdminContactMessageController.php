<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminContactMessageController extends Controller
{
    //show all contact message
    public function show(){
        $messages = Contact::orderBy('id','desc')->paginate(25);
        return view('admin.contact.show',compact('messages'));
    }

    //view single message
    public function viewMessage($id){
        $message = Contact::find($id);

        if($message->status=='0'){
            $message->status=1;
            $message->save();
        }
        return view('admin.contact.message_single',compact('message'));
    }//end method


     //delete multiple message
     public function delete(Request $request){
        $ids = $request->ids;
        foreach($ids as $id){
            Contact::where('id',$id)->delete();
        }

        return response()->json([
            'status'=>'Successfully deleted.',
        ]);
    }//end method
}//end method
