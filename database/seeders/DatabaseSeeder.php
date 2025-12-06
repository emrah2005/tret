<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Brand user
        $brand = User::create([
            'name'     => 'Eco Gadgets Brand',
            'email'    => 'brand@example.com',
            'password' => Hash::make('password'),
            'role'     => 'brand',
            'status'   => 'active',
        ]);

        // Influencer user
        $influencer = User::create([
            'name'     => 'Beauty Creator',
            'email'    => 'influencer@example.com',
            'password' => Hash::make('password'),
            'role'     => 'influencer',
            'status'   => 'active',
        ]);

        // Brand profile
        Profile::create([
            'user_id' => $brand->id,
            'type'    => 'business',
            'metrics' => [
                'company_name'   => 'Eco Gadgets Brand',
                'business_email' => 'brand@example.com',
                'industry'       => 'Eco Tech',
                'location'       => 'Skopje, North Macedonia',
                'company_size'   => '1–10 employees',
                'description'    => 'We sell eco-friendly gadgets and accessories.',
            ],
        ]);

        // Influencer profile with metrics for matching
        Profile::create([
            'user_id' => $influencer->id,
            'type'    => 'influencer',
            'metrics' => [
                'niches'          => ['beauty', 'skincare', 'lifestyle'],
                'platforms'       => ['instagram', 'tiktok'],
                'avg_reach'       => 20000,
                'engagement_rate' => 5.4,     // %
                'location'        => 'Tetovo, North Macedonia',
            ],
        ]);

        // Simple campaign seeded for brand
        Campaign::create([
            'brand_id'   => $brand->id,
            'name'       => 'Spring Eco Skincare Launch',
            'brief'      => 'Looking for beauty and skincare creators for TikTok & IG Reels to promote eco skincare line.',
            'budget'     => 3500,
            'currency'   => 'EUR',
            'start_date' => now()->addWeek(),
            'end_date'   => now()->addWeeks(4),
            'status'     => 'published',
        ]);
    }
}
