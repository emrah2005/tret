@extends('layouts.app')

@section('title', 'Influencer Onboarding – Step 2')

@section('content')

    <x-stepper :steps="['Basic Info', 'Categories', 'Socials', 'Metrics', 'Review', 'Finish']" :active="2" />

    <form action="{{ route('influencer.step2.submit') }}" method="POST" class="space-y-6">
        @csrf

        <p class="text-gray-600">Select the categories that describe your content.</p>

        <div class="grid grid-cols-2 gap-4">

            @php
                $categories = [
                    'Fashion', 'Lifestyle', 'Travel', 'Fitness', 'Food',
                    'Music', 'Beauty', 'Gaming', 'Tech', 'Education',
                    'Sports', 'Motivation', 'Business', 'Comedy'
                ];
            @endphp

            @foreach($categories as $category)
                <label class="flex items-center gap-2 p-3 border rounded-lg cursor-pointer bg-white shadow-sm">
                    <input
                        type="checkbox"
                        name="categories[]"
                        value="{{ $category }}"
                        class="h-4 w-4 text-purple-600 border-gray-300 rounded"
                    >
                    <span>{{ $category }}</span>
                </label>
            @endforeach

        </div>

        <button class="bg-purple-600 text-white px-6 py-2 rounded mt-4">
            Continue
        </button>
    </form>

@endsection
