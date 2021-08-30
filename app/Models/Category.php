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

    public function getParentNameAttribute()
    {
        $p_id=$this->parent;
        if($p_id!=0){
            $p_name=Category::find($p_id)->title;
            return $this->attributes['parent_name'] = $p_name;
        }
    }

    protected function products()
    {
        return $this->hasMany(Product::class);
    }
}
