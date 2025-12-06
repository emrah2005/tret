<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'campaign_id',
        'influencer_id',
        'amount',
        'status', // pending | accepted | rejected | cancelled
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function influencer()
    {
        return $this->belongsTo(User::class, 'influencer_id');
    }
}
