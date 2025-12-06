<?php

namespace App\Services;

use App\Models\Campaign;
use App\Models\User;

class MatchingService
{
    /**
     * Returns influencers sorted by match score (0–100).
     */
    public function matchInfluencers(Campaign $campaign): array
    {
        // Only influencers
        $influencers = User::where('role', 'influencer')
            ->with('profile')
            ->get();

        $results = [];

        foreach ($influencers as $influencer) {
            $profile = $influencer->profile;

            if (!$profile) {
                continue;
            }

            $metrics  = $profile->metrics ?? [];

            $niches        = (array)($metrics['niches'] ?? []);
            $platforms     = (array)($metrics['platforms'] ?? []);
            $avgReach      = (float)($metrics['avg_reach'] ?? 0);
            $engagement    = (float)($metrics['engagement_rate'] ?? 0); // e.g. 5 = 5%
            $campaignBrief = $campaign->brief ?? '';

            $keywords = $this->extractKeywords($campaignBrief);

            $score = 0;

            // Up to 40 pts → niche fit
            $score += $this->scoreNiches($niches, $keywords);

            // Up to 20 pts → platforms (simple check if they exist)
            $score += $this->scorePlatforms($platforms);

            // Up to 20 pts → audience size
            $score += $this->scoreReach($avgReach);

            // Up to 20 pts → engagement
            $score += $this->scoreEngagement($engagement);

            $results[] = [
                'influencer' => $influencer,
                'profile'    => $profile,
                'score'      => $score,
            ];
        }

        usort($results, fn ($a, $b) => $b['score'] <=> $a['score']);

        return $results;
    }

    private function extractKeywords(string $text): array
    {
        $text = strtolower($text);
        $words = preg_split('/[^a-z]+/', $text);
        $words = array_filter($words, fn($w) => strlen($w) > 3);

        return array_values(array_unique($words));
    }

    private function scoreNiches(array $niches, array $keywords): int
    {
        $score = 0;

        foreach ($niches as $niche) {
            $n = strtolower($niche);
            if (in_array($n, $keywords)) {
                $score += 10;
            }
        }

        return min($score, 40);
    }

    private function scorePlatforms(array $platforms): int
    {
        if (empty($platforms)) {
            return 0;
        }

        // For now: any platform → +15, 2+ platforms → +20
        return count($platforms) >= 2 ? 20 : 15;
    }

    private function scoreReach(float $reach): int
    {
        if ($reach >= 50000) return 20;
        if ($reach >= 20000) return 15;
        if ($reach >= 5000)  return 10;
        if ($reach >= 1000)  return 5;
        return 0;
    }

    private function scoreEngagement(float $engagementPercent): int
    {
        // engagementPercent is like 5 = 5%
        if ($engagementPercent >= 7) return 20;
        if ($engagementPercent >= 5) return 15;
        if ($engagementPercent >= 3) return 10;
        if ($engagementPercent >= 1.5) return 5;
        return 0;
    }
}
