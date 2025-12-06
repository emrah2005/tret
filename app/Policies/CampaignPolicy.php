<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Campaign;

class CampaignPolicy {
    public function update(User $user, Campaign $campaign){
        return $user->id === $campaign->brand_id || $user->role === 'admin';
    }
    public function view(User $user, Campaign $campaign){
        return true;
    }
}
