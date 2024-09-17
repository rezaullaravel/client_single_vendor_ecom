<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_description',
    ];

    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    public function childcategories(){
        return $this->hasMany(Childcategory::class);
    }
}
