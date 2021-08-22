<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Recipient extends Model
{
    protected $guarded=[];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
