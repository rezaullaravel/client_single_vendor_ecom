<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $table = 'subcategories';

    protected $fillable = [
        'category_id',
        'subcategory_name',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id')->withDefault();
    }
}
