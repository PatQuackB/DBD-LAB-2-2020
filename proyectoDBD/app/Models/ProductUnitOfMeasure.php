<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUnitOfMeasure extends Model
{
    use HasFactory;

    public function Product(){
        return $this->belongsTo(Product::class);
    } 

    public function UnitOfMeasure(){
        return $this->belongsTo(UnitOfMeasure::class);
    }     
 
}
