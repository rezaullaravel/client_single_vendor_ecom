<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','subcategory_id','childcategory_id','brand_id','pickup_point_id',
    'name','code','unit','tags','video','purchase_price','selling_price','discount_price','stock_quantity',
    'stock_quantity','warehouse','description','thumbnail','images','featured','today_deal','status',
    'flash_deal_id','cash_on_delivery'
];


public function category(){
    return $this->belongsTo(Category::class)->withDefault();
}



public function brand(){
    return $this->belongsTo(Brand::class);
}

public function productMultiImage(){
    return $this->hasMany(ProductMultiImage::class,'product_id');
}

public function colors()
{
    return $this->belongsToMany(Color::class, 'color_products', 'product_id', 'color_id');
}





}//end class
