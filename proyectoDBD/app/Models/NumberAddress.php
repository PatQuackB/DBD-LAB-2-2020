<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberAddress extends Model
{
    use HasFactory;

    public function Commune(){
        return $this->belongsTo(Commune::class);
    } 

    public function StreetAddress(){
        return $this->belongsTo(StreetAddress::class);
    }     

}
