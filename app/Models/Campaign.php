<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'brand_id',
        'name',
        'brief',
        'budget',
        'currency',
        'start_date',
        'end_date',
        'status', // draft | published | closed
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
    ];

    public function brand()
    {
        return $this->belongsTo(User::class, 'brand_id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}

