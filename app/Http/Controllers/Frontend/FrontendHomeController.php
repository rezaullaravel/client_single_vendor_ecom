<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Brand;
use App\Models\Color;
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


    // //subcategory wise product show
    // public function subcategoryWiseProductShow($id){
    //             // Find the subcategory
    //         $subcategory = Subcategory::find($id);

    //         // Get the category associated with the subcategory
    //         $category = Category::where('id', $subcategory->category_id)->first();

    //         // Fetch all subcategories under the same category
    //         $subcategories = Subcategory::where('category_id', $subcategory->category_id)->get();

    //         // Fetch products based on subcategory_id and paginate them
    //         $products = Product::where('subcategory_id', $id)->paginate(30);

    //         // Get the unique brand IDs associated with the products in that subcategory
    //         $getBrands = $products->pluck('brand_id')->unique();

    //         // Fetch the brands using the unique brand IDs
    //         $brands = Brand::whereIn('id', $getBrands)->get();


    //         $getProductIds = $products->pluck('id');
    //         // Fetch the colors associated with those products using the color_products table
    //         $colors = Color::whereIn('id', function ($query) use ($getProductIds) {
    //             $query->select('color_id')
    //                 ->from('color_products')
    //                 ->whereIn('product_id', $getProductIds);
    //         })->get();

    //     return view('frontend.product.subcategorywise_product_show',compact('products','category','subcategory','brands','subcategories','colors'));
    // }//end method

    //sub category wise product
    public function subcategoryWiseProductShow($id){
        // Find the subcategory
        $subcategory = Subcategory::find($id);

        // Get the category associated with the subcategory
        $category = Category::where('id', $subcategory->category_id)->first();

        // Fetch all subcategories under the same category
        $subcategories = Subcategory::where('category_id', $subcategory->category_id)->get();

        // Fetch products based on subcategory_id (subcategory-specific products)
        $products = Product::where('subcategory_id', $id)->paginate(30);

        // Fetch all products under the entire category (to get brands and colors for all category products)
        $categoryProductIds = Product::where('category_id', $subcategory->category_id)->pluck('id');

        // Fetch unique brand IDs associated with the products in the entire category
        $getBrands = Product::whereIn('id', $categoryProductIds)->pluck('brand_id')->unique();

        // Fetch the brands using the unique brand IDs
        $brands = Brand::whereIn('id', $getBrands)->get();

        // Fetch colors associated with the products in the entire category using the color_products table
        $colors = Color::whereIn('id', function ($query) use ($categoryProductIds) {
            $query->select('color_id')
                ->from('color_products')
                ->whereIn('product_id', $categoryProductIds);
        })->get();

        // Pass all data to the view, including subcategory-specific products
        return view('frontend.product.subcategorywise_product_show', compact(
            'products', // Specific products for the subcategory
            'category',            // The category object
            'subcategory',         // The subcategory object
            'brands',              // All brands associated with the category
            'subcategories',       // All subcategories under the category
            'colors'               // All colors associated with the category's products
        ));
    }//end method


    //product filter
    public function filter(Request $request)
    {
        $query = Product::query();



        if(!empty($request->category_id)){
            $query->where('category_id', $request->category_id);
            $category = Category::where('id',$request->category_id)->first();
        }

        // Filter by subcategories
        if (!empty($request->subcats)) {
            $query->whereIn('subcategory_id', $request->subcats);
        }

        // Filter by price range
        if (!empty($request->min_price) && !empty($request->max_price)) {
            $query->whereBetween('selling_price', [$request->min_price, $request->max_price]);
        }

        // Filter by brands
        if (!empty($request->brands)) {
            $query->whereIn('brand_id', $request->brands);
        }


        // Apply a condition to filter by color
        if ($request->has('color') && $request->input('color') !== 'null') {
            $query->join('color_products', 'products.id', '=', 'color_products.product_id')->where('color_products.color_id', $request->input('color'));
        }

        // Ensure products are distinct to avoid duplicates
        $query->select('products.*')->distinct();


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

        // Get brands for the current category
        $getBrands = Product::where('category_id', $request->category_id)
                            ->pluck('brand_id')
                            ->unique();
        $brands = Brand::whereIn('id', $getBrands)->get();

        // Get all colors used in the category products
        $colorProductIds = Product::where('category_id', $request->category_id)->pluck('id');
        $colors = Color::whereIn('id', function ($query) use ($colorProductIds) {
            $query->select('color_id')
                  ->from('color_products')
                  ->whereIn('product_id', $colorProductIds);
        })->get();

        // Check if request is an AJAX call
        if ($request->ajax()) {
             return view('frontend.product.partials.filter_products', compact('products'))->render();
        }

        // For non-AJAX requests (initial page load)
        return view('frontend.product.subcategorywise_product_show', compact('products'));
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
