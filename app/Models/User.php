<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',      // admin | brand | influencer
        'verified',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'verified'          => 'boolean',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function campaigns()
    {
        // campaigns where this user is the brand
        return $this->hasMany(Campaign::class, 'brand_id');
    }
}

