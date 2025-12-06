<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deliverable extends Model
{
    protected $fillable = [
        'campaign_id',
        'influencer_id',
        'type',      // post, story, reel...
        'file_url',
        'due_at',
        'status',    // pending | submitted | approved | rejected
    ];

    protected $casts = [
        'due_at' => 'date',
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
