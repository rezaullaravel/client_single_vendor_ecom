<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductSize;
use App\Models\ColorProduct;
use Illuminate\Http\Request;
use App\Models\ProductMultiImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    //add product
    public function add(){
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.product.add',compact('categories','brands','colors','sizes'));
    }//end method


    //store
    public function store(Request $request){

        $request->validate([
            'category_id' => 'required',
            'subcategory_id'=>'required',
            'brand_id' => 'required',
            'name' => 'required|unique:products',
            'code' => 'required',
            'purchase_price' => 'required',
            'stock_availability' => 'required',
            'color_id' => 'required',
            'description' => 'required',
            'best_selling' => 'required',
            'thumbnail' => 'required|image',
        ],[
            'category_id.required' =>'The category field is required.',
            'brand_id.required' =>'The brand field is required.',
            'color_id.required' =>'The color field is required.',
        ]);


         //product thumbnail image upload
         if($request->file('thumbnail')){
            $image = $request->file('thumbnail');
            $imageName = rand().'.'.$image->getClientOriginalName();
            Image::make($image)->resize(620,620)->save('upload/product_images/'.$imageName);
            $thumbnail_path = 'upload/product_images/'.$imageName;
        }


        //data insert
        $product = new Product();
        $product->category_id = $request->category_id;

        $product->subcategory_id = $request->subcategory_id;

        $product->brand_id = $request->brand_id;

        $product->name = $request->name;

        $product->code = $request->code;

       if(!empty($request->video)){
        $product->video = $request->video;
       }

        $product->purchase_price = $request->purchase_price;

        $product->discount_price = $request->discount_price;

        if(!empty($request->discount_price)){
            $total_commision = ($request->discount_price*$request->purchase_price)/100;

        $product->selling_price = $request->purchase_price-$total_commision;
        } else {
            $product->selling_price = $request->purchase_price;
        }


        $product->stock_availability = $request->stock_availability;

        $product->description = $request->description;

        $product->thumbnail = $thumbnail_path;


        if($request->featured==1){
            $product->featured = 1;
        } else{
            $product->featured = 0;
        }

        if($request->today_deal==1){
            $product->today_deal = 1;
        } else{
            $product->today_deal = 0;
        }

        $product->best_selling = $request->best_selling;

        if($request->status==1){
            $product->status = 1;
        } else{
            $product->status = 0;
        }

        $product->save();


        //product multiple image upload
        if($request->file('images')){
            $images = $request->file('images');
           foreach($images  as $image){
            $imageName = rand().'.'.$image->getClientOriginalName();
            Image::make($image)->resize(620,620)->save('upload/product_images/'.$imageName);
            $image_path = 'upload/product_images/'.$imageName;

            ProductMultiImage::create([
                'product_image' =>  $image_path,
                'product_id' =>   $product->id,
            ]);

           }
        }


        //multiple color insert
        foreach($request->color_id as $id){
            ColorProduct::create([
                'product_id'=>$product->id,
                'color_id'=>$id,
            ]);
        }

        //multiple size insert
        if(!empty($request->size_id )){
            foreach($request->size_id as $id){
                ProductSize::create([
                    'product_id'=>$product->id,
                    'size_id'=>$id,
                ]);
            }
        }


        return redirect()->back()->with('message','Product added successfully');
    }//end method


    //manage
    public function manage(Request $request) {
        $categories = Category::all();
        $brands = Brand::all();

        // Fetch products based on filters
        $query = Product::query();

        // Apply filters if provided
        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->brand_id) {
            $query->where('brand_id', $request->brand_id);
        }

        if ($request->status !== null) {
            $query->where('status', $request->status);
        }

        $products = $query->get();

        if ($request->ajax()) {
            // Return partial view with filtered products for AJAX requests
            return view('admin.product.partials.product_list', compact('products'))->render();
        }

        return view('admin.product.index', compact('products', 'categories', 'brands'));
    }//end method



    //product status deactive
    public function productStatusDeactive($id){
        $product = Product::find($id);
        $product->status=0;
        $product->save();
        return redirect()->back()->with('message','Product status deactive successfully');
    }//end method


    //product status active
    public function productStatusActive($id){
        Product::find($id)->update([
            'status'=>1,
        ]);

        return redirect()->back()->with('message','Product status active successfully');
    }//end method


    //product featured deactive
    public function productFeaturedDeactive($id){
        Product::find($id)->update([
            'featured'=>0,
        ]);

        return redirect()->back()->with('message','Product featured deactive successfully');
    }//end method


    //product featured active
    public function productFeaturedActive($id){
        Product::find($id)->update([
            'featured'=>1,
        ]);

        return redirect()->back()->with('message','Product featured active successfully');
    }//end method


    //product today deal deactive
    public function productDealDeactive($id){
        Product::find($id)->update([
            'today_deal'=>0,
        ]);

        return redirect()->back()->with('message','Product today deal deactive successfully');
    }//end method


    //product today deal active
    public function productDealActive($id){
        Product::find($id)->update([
            'today_deal'=>1,
        ]);

        return redirect()->back()->with('message','Product today deal active successfully');
    }//end method


    //product best selling deactive
    public function bestSellingDeactive($id){

       $product = Product::find($id);
       $product->best_selling = 0;
       $product->save();

        return redirect()->back()->with('message','Product best selling deactive successfully');
    }//end method


    //product best selling active
    public function bestSellingActive($id){
        $product = Product::find($id);
        $product->best_selling = 1;
        $product->save();

        return redirect()->back()->with('message','Product best selling active successfully');
    }//end method


    //product edit
    public function edit($id){
        $product =   Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();
        $productColors = ColorProduct::where('product_id', $id)->pluck('color_id')->toArray();
        $productSizes = ProductSize::where('product_id', $id)->pluck('size_id')->toArray();
        return view('admin.product.edit',compact('product','categories','brands','colors','productColors','sizes','productSizes'));
    }//end method


    //product update
    public function update(Request $request){
        $product =   Product::find($request->id);

        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'name' => 'required|unique:products,name,'.$request->id,
            'code' => 'required',
            'purchase_price' => 'required',
            'stock_availability' => 'required',
            'color_id' => 'required',
            'description' => 'required',
            'best_selling' => 'required',
        ],[
            'category_id.required' =>'The category field is required.',
            'brand_id.required' =>'The brand field is required.',
            'color_id.required' =>'The color field is required.',
        ]);




         //product thumbnail image upload
         if($request->file('thumbnail')){
            if(File::exists($product->thumbnail)){
                unlink($product->thumbnail);
            }
            $image = $request->file('thumbnail');
            $imageName = rand().'.'.$image->getClientOriginalName();
            Image::make($image)->resize(620,620)->save('upload/product_images/'.$imageName);
            $thumbnail_path = 'upload/product_images/'.$imageName;
            $product->thumbnail = $thumbnail_path;
        }


     //data update
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->code = $request->code;
        $product->purchase_price = $request->purchase_price;
        $product->discount_price = $request->discount_price;

    // Calculate selling price
        if(!empty($request->discount_price)){
            $total_commission = ($request->discount_price * $request->purchase_price) / 100;
            $product->selling_price = $request->purchase_price - $total_commission;
        } else {
            $product->selling_price = $request->purchase_price;
        }

        $product->stock_availability = $request->stock_availability;
        $product->description = $request->description;
        $product->best_selling = $request->best_selling;
        $product->video = $request->video;

    // Set optional fields
    $product->featured = $request->featured == 1 ? 1 : 0;
    $product->today_deal = $request->today_deal == 1 ? 1 : 0;
    $product->status = $request->status == 1 ? 1 : 0;

    $product->save();



        //product multiple image upload
        if($request->file('images')){
            $images = $request->file('images');
           foreach($images  as $image){
            $imageName = rand().'.'.$image->getClientOriginalName();
            Image::make($image)->resize(620,620)->save('upload/product_images/'.$imageName);
            $image_path = 'upload/product_images/'.$imageName;

            ProductMultiImage::create([
                'product_image' =>  $image_path,
                'product_id' =>   $product->id,
            ]);

           }
        }


        // Update colors
        ColorProduct::where('product_id', $request->id)->delete();
        foreach($request->color_id as $colorId){
            ColorProduct::create([
                'product_id' => $product->id,
                'color_id' => $colorId,
            ]);
        }

        //update sizes
        if(!empty($request->size_id )){
            ProductSize::where('product_id', $request->id)->delete();
            foreach($request->size_id as $sizeId){
                ProductSize::create([
                    'product_id' => $product->id,
                    'size_id' => $sizeId,
                ]);
            }
        }

        return redirect('/admin/product/manage')->with('message','Product updated successfully');
    }//end method


    //product delete
    public function delete($id){
        $product =   Product::find($id);

        //product thumbnail delete
        if(File::exists($product->thumbnail)){
            File::delete($product->thumbnail);
        }

        //product multiple image delete
        if($product->productMultiImage){
            foreach($product->productMultiImage as $image){
                if(File::exists( $image->product_image)){
                    unlink( $image->product_image);
                }

                $imgdelete = ProductMultiImage::find($image->id)->delete();
            }
        }


        //delte color product table data
        $color_product = ColorProduct::where('product_id',$id)->delete();

        $product->delete();
        return redirect('/admin/product/manage')->with('message','Product deleted successfully');
    }//end method


    //product view
    public function view($id){
        // Fetch the product with related colors
         $product = Product::with('colors')->find($id);
        // Access the product's colors
        $colorNames = $product->colors->pluck('name');
        $sizeNames = $product->sizes->pluck('size');

        return view('admin.product.view',compact('product','colorNames','sizeNames'));

    }//end method


    //product multiple image delete
    public function ProductMultiImgDelete($id){
            $data = ProductMultiImage::find($id);

                if(File::exists($data->product_image)){
                    File::delete($data->product_image);
                }

           $data->delete();
           return redirect()->back();
    }//end method







}//end class
