<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->hasOne(Product::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
