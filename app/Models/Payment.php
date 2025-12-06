<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'campaign_id',
        'brand_id',
        'influencer_id',
        'amount',
        'provider',
        'status',   // initiated | escrowed | released | failed
        'escrow_id',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
