<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'color',
        'size',
        'quantity',
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function size(){
        return $this->belongsTo(Size::class,'size_id')->withDefault();
    }
}
