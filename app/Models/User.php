<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Recipient;
use App\Models\Order;

class User extends Authenticatable
{
    use Notifiable;

    const ROLE_ADMIN = 'admin';
    const ROLE_MANAGER = 'manager';
    const ROLE_USER = 'user';

    protected $fillable = [
        'name', 'email', 'password', 'role', 'birthday', 'phone_no', 'status', 'remember_token', 'api_token'
    ];

    protected $hidden = [
        'password', 'remember_token', 'api_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function recipients()
    {
        return $this->hasMany(Recipient::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getTotalSpentAttribute()
    {
        return $this->attributes['total_spent'] = Order::where('user_id', $this->id)->sum('amount_total');
    }

    public function getOrderLengthAttribute()
    {
        return $this->attributes['order_length'] = Order::where('user_id', $this->id)->count();
    }
}
