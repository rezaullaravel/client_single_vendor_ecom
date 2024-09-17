<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Brand;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Childcategory;
use App\Http\Controllers\Controller;

class FrontendHomeController extends Controller
{
    //home page
    public function index(){
        $categories = Category::all();

        $newArrivalProducts = Product::where('status',1)->orderBy('id','desc')->limit(4)->get();

        $featuredProducts = Product::where('status',1)->where('featured',1)->orderBy('id','desc')->limit(4)->get();

        $bestSellingProducts = Product::where('status',1)->where('best_selling',1)->orderBy('id','desc')->limit(4)->get();

        return view('frontend.home.index',compact('categories','newArrivalProducts','featuredProducts','bestSellingProducts'));
    }//end method


    //product single page
    public function productSingle($id){
        $product = Product::with('colors')->find($id);
                   Product::where('id',$id)->increment('product_view');

        $colors = $product->colors->pluck('name', 'id','code');
        $product_reviews = Review::where('product_id',$product->id)->get();

        $related_products = Product::where('category_id', $product->category_id)
        ->where('id', '!=', $id)
        ->limit(4)
        ->get();

        return view('frontend.product.product_single',compact('product','colors','product_reviews','related_products'));
    }//end method


    //category wise product show
    public function categoryWiseProductShow($id){
        $category = Category::where('id',$id)->first();
        $products = Product::where('category_id',$id)->limit(8)->paginate(30);

         // Get the unique brand IDs associated with the products in that category
         $getBrands = Product::where('category_id', $id)->pluck('brand_id')->unique();

         // Fetch the brands using the unique brand IDs
         $brands = Brand::whereIn('id', $getBrands)->get();
        return view('frontend.product.categorywise_product_show',compact('products','category','brands'));
    }//end method


    //product filter
    public function filter(Request $request)
    {
        $query = Product::query();

        // Filter by category
        if (!empty($request->category_id)) {
            $query->where('category_id', $request->category_id);
            $category = Category::findOrFail($request->category_id);
        }

        // Filter by price range
        if (!empty($request->min_price) && !empty($request->max_price)) {
            $query->whereBetween('selling_price', [$request->min_price, $request->max_price]);
        }

        // Filter by brands
        if (!empty($request->brands)) {
            $query->whereIn('brand_id', $request->brands);
        }

        // Sorting
        if (!empty($request->sort)) {
            $sort = $request->sort;
            if ($sort == 'price-asc') {
                $query->orderBy('selling_price', 'asc');
            } elseif ($sort == 'price-desc') {
                $query->orderBy('selling_price', 'desc');
            }
        }

        // Pagination
        $products = $query->paginate(30);

        // Get the unique brand IDs associated with the filtered products
        $getBrands = Product::where('category_id', $request->category_id)
                            ->pluck('brand_id')
                            ->unique();

        // Fetch the brands using the unique brand IDs
        $brands = Brand::whereIn('id', $getBrands)->get();

        // Check if request is an AJAX call
        if ($request->ajax()) {
            return view('frontend.product.partials.filter_products', compact('products', 'category', 'brands'))->render();
        }

        // For non-AJAX requests (full page reload)
        return view('frontend.product.categorywise_product_show', compact('products', 'category', 'brands'));
    }

//end method


//product search
public function productSearch(Request $request){
    // Get the search term from the request
    $searchTerm = $request->input('string');

    // Query the Product model, searching by name and applying pagination
    $products = Product::where('name', 'LIKE', "%{$searchTerm}%")
        ->paginate(30); // Adjust the number of items per page as needed

        return view('frontend.product.search_products',compact('products'));
}//end method


    //about us page
    public function aboutUs(){
        return view('frontend.about.about');
    }//end method













}//end class
