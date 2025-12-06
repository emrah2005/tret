<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected function getCurrentUser(): ?User
    {
        return Auth::user() ?? User::first();
    }

    public function influencer()
    {
        $user = $this->getCurrentUser();
        $profile = Profile::where('user_id', $user->id)->where('type', 'influencer')->first();

        return view('dashboard.influencer', [
            'user'    => $user,
            'profile' => $profile,
            'metrics' => $profile?->metrics ?? [],
        ]);
    }

    public function business()
    {
        $user = $this->getCurrentUser();
        $businessProfile = Profile::where('user_id', $user->id)->where('type', 'business')->first();
        $businessMetrics = $businessProfile?->metrics ?? [];

        $desiredNiches = collect($businessMetrics['desired_niches'] ?? []);

        $influencerProfiles = Profile::where('type', 'influencer')->get();

        $matches = $influencerProfiles->map(function ($p) use ($desiredNiches) {
            $m = $p->metrics ?? [];
            $niches = collect($m['niches'] ?? []);
            $overlap = $niches->intersect($desiredNiches);
            $score = $overlap->count();

            return [
                'profile' => $p,
                'metrics' => $m,
                'score'   => $score,
                'overlap' => $overlap->values()->all(),
            ];
        })->sortByDesc('score');

        return view('dashboard.business', [
            'user'    => $user,
            'profile' => $businessProfile,
            'metrics' => $businessMetrics,
            'matches' => $matches,
        ]);
    }
}


