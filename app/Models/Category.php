<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    protected $guarded = [];

    protected $attributes =[
        'show' => false,
    ];

    protected function products()
    {
        return $this->hasMany(Product::class);
    }
}
