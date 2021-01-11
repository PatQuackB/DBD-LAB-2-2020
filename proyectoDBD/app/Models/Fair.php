<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fair extends Model
{
    use HasFactory;

    public function Stall(){
        return $this->hasMany(Stall::class);
    } 

}
