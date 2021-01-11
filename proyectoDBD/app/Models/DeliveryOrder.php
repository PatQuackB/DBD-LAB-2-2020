<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    use HasFactory;

    public function StreetAddress(){
        return $this->belongsTo(StreetAddress::class);
    }  

    public function PaymentMethod(){
        return $this->hasOne(PaymentMethod::class);
    }     
    
    public function DeliveryOrderPurchaseOrder(){
        return $this->hasMany(DeliveryOrderPurchaseOrder::class);
    } 
    
}
