<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StreetAddress extends Model
{
    use HasFactory;

    public function DeliveryOrder(){
        return $this->hasMany(DeliveryOrder::class);
    }

    public function User(){
        return $this->hasMany(User::class);
    }

    public function Stall(){
        return $this->hasMany(Stall::class);
    }

    public function NumberAddress(){
        return $this->hasMany(NumberAddress::class);
    }
}
