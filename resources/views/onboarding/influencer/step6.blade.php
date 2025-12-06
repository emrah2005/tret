@extends('layouts.app')

@section('title', 'Onboarding Complete')

@section('content')

    <div class="text-center py-20">
        <h1 class="text-3xl font-bold text-purple-600">You're all set! 🎉</h1>
        <p class="text-gray-600 mt-2">Your influencer profile is now active.</p>

        <a href="/dashboard" class="mt-6 inline-block bg-purple-600 text-white px-6 py-3 rounded-lg">
            Go to Dashboard
        </a>
    </div>

@endsection
