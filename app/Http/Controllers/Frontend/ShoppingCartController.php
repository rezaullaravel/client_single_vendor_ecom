<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Wishlist;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    //view shopping cart
    public function viewShoppingCart(){
            return view('frontend.shopping_cart.index');
    }//end method



    //product add to cart
    public function productAddToCart(Request $request){

            $product = ShoppingCart::where('user_id',Auth::user()->id)->where('product_id',$request->product_id)->where('color_id',$request->color_id)->first();

            if($product){
                return redirect()->back()->with('error','This product has been already added to shopping cart');
            } else {
                ShoppingCart::insert([
                    'user_id' => Auth::user()->id,
                    'product_id' => $request->product_id,
                    'color_id' => $request->color_id,
                    'quantity' => $request->quantity,
                ]);

                return redirect()->back()->with('message','Product added to shopping cart');
            }

    }//end method


    //cart quantity increment
    public function incrementQuantity(Request $request){
        $product = ShoppingCart::find($request->rowId);

        $product->quantity=$product->quantity+1;
        $product->save();
        return response()->json($product);
    }//end method


    //cart quantity decrement
    public function decrementQuantity(Request $request){
        $product = ShoppingCart::find($request->rowId);

        $product->quantity=$product->quantity-1;
        $product->save();
        return response()->json($product);
    }//end method



    //cart item delete
    public function cartItemDelete($id){
        $product = ShoppingCart::find($id)->delete();
        return redirect()->back()->with('message','Cart item deleted successfully');

    }//end method


    //cart product color update
    public function cartProductColorUpdate(Request $request){
        // ShoppingCart::find($request->rowId)->update([
        //     'color_id' => $request->color_id,
        // ]);

        $cart = ShoppingCart::find($request->rowId);
        $cart->color_id = $request->color_id;
        $cart->save();


        return response()->json([
          'status' => 'Cart product color updated',
        ]);
    }//end method


    //empty all cart item
    public function emptyCart(){
        ShoppingCart::where('user_id',Auth::user()->id)->delete();
        return redirect()->back()->with('message','Shopping cart is empty now');
    }//end method

}//end class
