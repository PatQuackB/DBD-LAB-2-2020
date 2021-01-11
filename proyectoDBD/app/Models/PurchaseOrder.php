<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function purchaseOrderProducts(){
        return $this->hasMany('App\Models\PurchaseOrderProduct');
    }

    public function deliveryOrderPurchaseOrders(){
        return $this->hasMany('App\Models\DeliveryOrderPurchaseOrder');
    }   
    
}
