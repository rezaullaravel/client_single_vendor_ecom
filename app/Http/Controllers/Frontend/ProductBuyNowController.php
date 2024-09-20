<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductBuyNowController extends Controller
{
    //buy now product
    public function buyNow(Request $request){
        $request->validate([
            'color_id'=>'required',
        ]);


        $product = ShoppingCart::where('user_id',Auth::user()->id)->where('product_id',$request->product_id)->where('color_id',$request->color_id)->first();

            if($product){
                $product->update([
                    'user_id' => Auth::user()->id,
                    'product_id' => $request->product_id,
                    'color_id' => $request->color_id,
                    'quantity' => $request->quantity,
                ]);
            } else {
                ShoppingCart::insert([
                    'user_id' => Auth::user()->id,
                    'product_id' => $request->product_id,
                    'color_id' => $request->color_id,
                    'quantity' => $request->quantity,
                ]);

                // return redirect()->back()->with('message','Product added to shopping cart');
            }

    }//end method
}
