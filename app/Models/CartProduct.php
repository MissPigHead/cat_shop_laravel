<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    protected $table='cart_product';
    protected $guarded=[];
    public $timestamps = false;
}
