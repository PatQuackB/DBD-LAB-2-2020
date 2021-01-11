<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    public function DeliveryOrder(){
        return $this->belongsTo(DeliveryOrder::class);
    }  

    public function PaymentMethodUser(){
        return $this->hasMany(PaymentMethodUser::class);
    }      

}
