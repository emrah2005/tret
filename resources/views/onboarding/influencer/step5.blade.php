@extends('layouts.app')

@section('title', 'Influencer Onboarding – Step 5')

@section('content')

    <x-stepper :steps="['Basic Info', 'Categories', 'Socials', 'Metrics', 'Review', 'Finish']" :active="5" />

    <h2 class="text-xl font-bold mb-4">Review your information</h2>

    @php
        $profile = auth()->user()->profile ?? null;
    @endphp

    <div class="space-y-2 text-gray-700 bg-white p-4 rounded-lg shadow">
        @if($profile)
            <p><strong>Name:</strong> {{ $profile->full_name ?? auth()->user()->name }}</p>
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
            <p><strong>Categories:</strong> {{ isset($profile->categories) ? implode(', ', $profile->categories) : '-' }}</p>
            <p><strong>Socials:</strong> {{ isset($profile->socials) ? json_encode($profile->socials) : '-' }}</p>
            <p><strong>Metrics:</strong> {{ isset($profile->metrics) ? json_encode($profile->metrics) : '-' }}</p>
        @else
            <p>No profile data yet.</p>
        @endif
    </div>

    <form action="{{ route('influencer.step5.submit') }}" method="POST" class="mt-6">
        @csrf

        <button class="bg-purple-600 text-white px-6 py-2 rounded">
            Finish Onboarding
        </button>
    </form>

@endsection
