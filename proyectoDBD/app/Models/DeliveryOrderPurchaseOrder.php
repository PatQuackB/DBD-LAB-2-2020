<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOrderPurchaseOrder extends Model
{
    use HasFactory;

    public function DeliveryOrder(){
        return $this->belongsTo(DeliveryOrder::class);
    } 

    public function PurchaseOrder(){
        return $this->belongsTo(PurchaseOrder::class);
    } 

}
