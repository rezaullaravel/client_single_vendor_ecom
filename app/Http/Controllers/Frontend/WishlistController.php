<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    //store product to wishlist
    public function store(Request $request){
        $product = Wishlist::where('user_id',Auth::user()->id)->where('product_id',$request->product_id)->first();

        if($product){
            return redirect()->back()->with('warning','Product is already exists in your wishlist');
        } else {
            Wishlist::insert([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
            ]);

            return redirect()->back()->with('message','Product added to wishlist');
        }

    }//end method


    //wishlist view
    public function wishlist(){

        return view('frontend.wishlist.index');
    }//end method


    //wishlist product delete
    public function wishlistProductDelete($id){
        Wishlist::find($id)->delete();
        return redirect()->back()->with('message','Product removed from wishlist');
    }//end method











}//end class
