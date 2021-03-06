<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderProduct extends Model
{
    use HasFactory;

    public function PurchaseOrder(){
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function Product(){
        return $this->belongsTo(Product::class);
    }
}
