<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function RolePermission(){
        return $this->hasMany(RolePermission::class);
    }

    public function User(){
        return $this->hasMany(User::class);
    }

}
