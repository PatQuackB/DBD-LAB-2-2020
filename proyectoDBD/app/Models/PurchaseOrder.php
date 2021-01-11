<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function PurchaseOrderProducts(){
        return $this->hasMany(PurchaseOrderProducts::class);
    }

    public function DeliveryOrderPurchaseOrders(){
        return $this->hasMany(DeliveryOrderPurchaseOrders::class);
    }   
    
}
