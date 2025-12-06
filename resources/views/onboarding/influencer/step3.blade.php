@extends('layouts.app')

@section('title', 'Influencer Onboarding – Step 3')

@section('content')

    <x-stepper :steps="['Basic Info', 'Categories', 'Socials', 'Metrics', 'Review', 'Finish']" :active="3" />

    <form action="{{ route('influencer.step3.submit') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block font-medium mb-1">Instagram Username</label>
            <input type="text" name="instagram" class="w-full border rounded p-2" placeholder="@username">
        </div>

        <div>
            <label class="block font-medium mb-1">TikTok Username</label>
            <input type="text" name="tiktok" class="w-full border rounded p-2" placeholder="@username">
        </div>

        <div>
            <label class="block font-medium mb-1">YouTube Channel URL</label>
            <input type="text" name="youtube" class="w-full border rounded p-2" placeholder="https://youtube.com/...">
        </div>

        <div>
            <label class="block font-medium mb-1">Website (optional)</label>
            <input type="text" name="website" class="w-full border rounded p-2">
        </div>

        <button class="bg-purple-600 text-white px-6 py-2 rounded">
            Continue
        </button>
    </form>

@endsection
