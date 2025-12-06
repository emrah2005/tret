<x-layouts.app title="Influencer Dashboard">
    <h1 class="text-2xl lg:text-3xl font-semibold text-slate-900 mb-2">
        Welcome, {{ $user->name ?? 'Creator' }}
    </h1>
    <p class="text-sm text-slate-500 mb-6">
        Here’s a quick overview of your creator profile and performance.
    </p>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-2xl p-5 shadow border border-slate-100">
            <h2 class="text-sm font-semibold text-slate-700 mb-1">Location</h2>
            <p class="text-xl font-semibold text-slate-900">
                {{ $metrics['location'] ?? 'N/A' }}
            </p>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow border border-slate-100">
            <h2 class="text-sm font-semibold text-slate-700 mb-1">Main Niches</h2>
            <div class="flex flex-wrap gap-2 mt-1">
                @foreach($metrics['niches'] ?? [] as $n)
                    <span class="px-3 py-1 rounded-full bg-slate-100 text-xs text-slate-700">{{ $n }}</span>
                @endforeach
                @if(empty($metrics['niches']))
                    <span class="text-xs text-slate-400">No niches set</span>
                @endif
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow border border-slate-100">
            <h2 class="text-sm font-semibold text-slate-700 mb-1">Onboarding</h2>
            <p class="text-xs mb-2 text-slate-500">
                Status:
            </p>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs
                         {{ !empty($metrics['onboarding_completed']) ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                {{ !empty($metrics['onboarding_completed']) ? 'Completed' : 'In Progress' }}
            </span>
        </div>
    </div>

    {{-- Socials --}}
    <div class="bg-white rounded-2xl p-5 shadow border border-slate-100 mb-6">
        <h2 class="text-sm font-semibold text-slate-800 mb-4">Social Media Overview</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach(($metrics['socials'] ?? []) as $social)
                <div class="border border-slate-100 rounded-xl p-4 bg-slate-50">
                    <p class="text-xs uppercase text-slate-500 mb-1">{{ ucfirst($social['platform']) }}</p>
                    <p class="text-sm font-semibold text-slate-900">{{ $social['username'] }}</p>
                    <p class="text-xs text-slate-500 mt-1">
                        Followers: <span class="font-semibold">{{ $social['followers'] ?? 0 }}</span>
                    </p>
                </div>
            @endforeach

            @if(empty($metrics['socials']))
                <p class="text-xs text-slate-400">No social accounts added yet.</p>
            @endif
        </div>
    </div>

    {{-- Performance --}}
    <div class="bg-white rounded-2xl p-5 shadow border border-slate-100">
        <h2 class="text-sm font-semibold text-slate-800 mb-4">Performance Metrics</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <p class="text-xs text-slate-500 mb-1">Avg Reach</p>
                <p class="text-lg font-semibold text-slate-900">
                    {{ $metrics['avg_reach'] ?? '—' }}
                </p>
            </div>
            <div>
                <p class="text-xs text-slate-500 mb-1">Engagement Rate (%)</p>
                <p class="text-lg font-semibold text-slate-900">
                    {{ $metrics['engagement_rate'] ?? '—' }}
                </p>
            </div>
            <div>
                <p class="text-xs text-slate-500 mb-1">Top Audience Country</p>
                <p class="text-lg font-semibold text-slate-900">
                    {{ $metrics['audience_top_country'] ?? '—' }}
                </p>
            </div>
            <div>
                <p class="text-xs text-slate-500 mb-1">Audience Age</p>
                <p class="text-lg font-semibold text-slate-900">
                    {{ $metrics['audience_age_range'] ?? '—' }}
                </p>
            </div>
        </div>
    </div>
</x-layouts.app>
