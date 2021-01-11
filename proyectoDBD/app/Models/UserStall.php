<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStall extends Model
{
    use HasFactory;

    public function Stall(){
        return $this->belongsTo(Stall::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
