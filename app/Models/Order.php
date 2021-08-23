<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Recipient;
use App\User;

class Order extends Model
{
    protected $guarded = [];

    public function recipient()
    {
        return $this->belongsTo(Recipient::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
