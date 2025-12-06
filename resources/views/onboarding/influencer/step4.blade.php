@extends('layouts.app')

@section('title', 'Influencer Onboarding – Step 4')

@section('content')

    <x-stepper :steps="['Basic Info', 'Categories', 'Socials', 'Metrics', 'Review', 'Finish']" :active="4" />

    <form action="{{ route('influencer.step4.submit') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block font-medium mb-1">Total Followers</label>
            <input type="number" name="followers" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block font-medium mb-1">Avg. Views per Post</label>
            <input type="number" name="avg_views" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block font-medium mb-1">Engagement Rate (%)</label>
            <input type="number" step="0.1" name="engagement_rate" class="w-full border rounded p-2" required>
        </div>

        <button class="bg-purple-600 text-white px-6 py-2 rounded">
            Continue
        </button>
    </form>

@endsection
