<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethodUser extends Model
{
    use HasFactory;

    public function PaymentMethod(){
        return $this->belongsTo(PaymentMethod::class);
    } 

    public function User(){
        return $this->belongsTo(User::class);
    }     

}
