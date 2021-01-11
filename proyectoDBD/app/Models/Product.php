<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function ProductUnitOfMeasure(){
        return $this->hasMany(ProductUnitOfMeasure::class);
    } 

    public function Category(){
        return $this->belongsTo(Category::class);
    } 

    public function PurchaseOrderProduct(){
        return $this->hasMany(PurchaseOrderProduct::class);
    } 

    public function ProductStall(){
        return $this->hasMany(ProductStall::class);
    } 

}
