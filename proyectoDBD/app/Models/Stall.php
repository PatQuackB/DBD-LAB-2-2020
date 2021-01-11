<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stall extends Model
{
    use HasFactory;

    public function Fair(){
        return $this->belongsTo(Fair::class);
    }

    public function StreetAddress(){
        return $this->belongsTo(StreetAddress::class);
    }

    public function UserStall(){
        return $this->hasMany(UserStall::class);
    }

    public function ProductStall(){
        return $this->hasMany(ProductStall::class);
    }
}
