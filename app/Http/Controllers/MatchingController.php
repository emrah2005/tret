<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Services\MatchingService;
use Illuminate\Support\Facades\Auth;

class MatchingController extends Controller
{
    protected MatchingService $matching;

    public function __construct(MatchingService $matching)
    {
        $this->matching = $matching;
    }

    public function recommend(Campaign $campaign)
    {
        $user = Auth::user();

        if (!$user || $user->id !== $campaign->brand_id) {
            abort(403);
        }

        $matches = $this->matching->matchInfluencers($campaign);

        return view('matching.recommendations', compact('campaign', 'matches'));
    }
}
