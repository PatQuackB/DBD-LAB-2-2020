<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function SubCategory(){
        return $this->hasMany(SubCategory::class);
    }

    public function Product(){
        return $this->hasMany(Product::class);
    }

}
