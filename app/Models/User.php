<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public function busket()
    {
        return $this->hasOne(Busket::class);
    }
    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
