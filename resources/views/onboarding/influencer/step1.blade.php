{{-- resources/views/onboarding/influencer/step1.blade.php --}}
@extends('layouts.app')

@section('title', 'Influencer Onboarding – Step 1')

@section('content')

    <x-stepper :steps="['Basic Info', 'Categories', 'Socials', 'Metrics', 'Review', 'Finish']" :active="1" />

    <form action="{{ route('influencer.step1.submit') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block font-medium mb-1">Full Name</label>
            <input type="text" name="full_name" class="w-full border rounded p-2" value="{{ old('full_name') }}" required>
        </div>

        <div>
            <label class="block font-medium mb-1">Email</label>
            <input type="email" name="email" class="w-full border rounded p-2" value="{{ old('email', auth()->user()->email ?? '') }}" required>
        </div>

        <div>
            <label class="block font-medium mb-1">Phone</label>
            <input type="text" name="phone" class="w-full border rounded p-2" value="{{ old('phone') }}">
        </div>

        <div>
            <label class="block font-medium mb-1">Location</label>
            <input type="text" name="location" class="w-full border rounded p-2" value="{{ old('location') }}">
        </div>

        <button class="bg-purple-600 text-white px-6 py-2 rounded">
            Continue
        </button>
    </form>

@endsection
