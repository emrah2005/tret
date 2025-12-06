<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = [
        'campaign_id',
        'brand_id',
        'influencer_id',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function brand()
    {
        return $this->belongsTo(User::class, 'brand_id');
    }

    public function influencer()
    {
        return $this->belongsTo(User::class, 'influencer_id');
    }
}
