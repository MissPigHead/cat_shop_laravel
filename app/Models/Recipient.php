<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order;
use App\Models\Postcode;

class Recipient extends Model
{
    protected $guarded=[];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postcode()
    {
        return $this->belongsTo(Postcode::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
