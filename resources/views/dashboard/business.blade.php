<x-layouts.app title="Business Dashboard">
    <h1 class="text-2xl lg:text-3xl font-semibold text-slate-900 mb-2">
        Welcome, {{ $metrics['company_name'] ?? $user->name ?? 'Brand' }}
    </h1>
    <p class="text-sm text-slate-500 mb-6">
        Here’s an overview of your brand profile and recommended creators.
    </p>

    {{-- Brand summary --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-2xl p-5 shadow border border-slate-100">
            <h2 class="text-sm font-semibold text-slate-700 mb-1">Industry</h2>
            <p class="text-xl font-semibold text-slate-900">
                {{ $metrics['industry'] ?? 'N/A' }}
            </p>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow border border-slate-100">
            <h2 class="text-sm font-semibold text-slate-700 mb-1">Campaign Title</h2>
            <p class="text-sm font-semibold text-slate-900">
                {{ $metrics['campaign_title'] ?? 'No active campaign' }}
            </p>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow border border-slate-100">
            <h2 class="text-sm font-semibold text-slate-700 mb-1">Budget</h2>
            <p class="text-xl font-semibold text-slate-900">
                @if(!empty($metrics['budget']))
                    €{{ $metrics['budget'] }}
                @else
                    —
                @endif
            </p>
        </div>
    </div>

    {{-- Recommended creators --}}
    <div class="bg-white rounded-2xl p-5 shadow border border-slate-100">
        <h2 class="text-sm font-semibold text-slate-800 mb-4">
            Recommended Creators (based on niches)
        </h2>

        @if($matches->count() === 0)
            <p class="text-xs text-slate-400">
                No creators available yet. Complete influencer onboarding to see matches.
            </p>
        @else
            <div class="space-y-4">
                @foreach($matches as $row)
                    @php
                        $p = $row['profile'];
                        $m = $row['metrics'];
                    @endphp
                    <div class="border border-slate-100 rounded-xl p-4 flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                        <div>
                            <p class="text-sm font-semibold text-slate-900">
                                {{ $p->user->name ?? 'Creator #'.$p->id }}
                            </p>
                            <p class="text-xs text-slate-500 mb-1">
                                Niches:
                                @foreach($m['niches'] ?? [] as $n)
                                    <span class="inline-block px-2 py-0.5 rounded-full bg-slate-100 text-[11px] text-slate-700">
                                        {{ $n }}
                                    </span>
                                @endforeach
                                @if(empty($m['niches']))
                                    <span class="text-[11px] text-slate-400">none</span>
                                @endif
                            </p>
                            <p class="text-[11px] text-slate-400">
                                Match score: <span class="font-semibold">{{ $row['score'] }}</span>
                                @if(!empty($row['overlap']))
                                    (shared: {{ implode(', ', $row['overlap']) }})
                                @endif
                            </p>
                        </div>

                        <div class="flex items-center gap-3 text-xs text-slate-600">
                            <div>
                                <p class="text-[11px] text-slate-500">Avg Reach</p>
                                <p class="text-sm font-semibold">
                                    {{ $m['avg_reach'] ?? '—' }}
                                </p>
                            </div>
                            <div>
                                <p class="text-[11px] text-slate-500">Engagement %</p>
                                <p class="text-sm font-semibold">
                                    {{ $m['engagement_rate'] ?? '—' }}
                                </p>
                            </div>
                            <button class="px-4 py-1.5 rounded-full bg-primary text-white text-xs font-semibold">
                                View Profile
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layouts.app>
