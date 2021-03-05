<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;

    public function NumberAddress(){
        return $this->hasMany(NumberAddress::class);
    }

    public function Region(){
        return $this->belongsTo(Region::class);
    }  

}
