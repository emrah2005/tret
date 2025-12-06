<x-layouts.app :title="'Matches for ' . $campaign->name">
    <div class="flex items-center justify-between mb-4">
        <div>
            <p class="text-xs text-slate-500 mb-1">Campaign</p>
            <h1 class="text-2xl font-semibold text-slate-900">
                {{ $campaign->name }}
            </h1>
        </div>

        <a href="{{ route('campaigns.show', $campaign) }}"
           class="px-4 py-2 rounded-full border border-slate-300 text-xs font-semibold text-slate-700 hover:bg-slate-50">
            Back to campaign
        </a>
    </div>

    <p class="text-sm text-slate-500 mb-6">
        These creators are recommended based on your campaign brief, niches, platforms, reach and engagement rate.
    </p>

    <div class="space-y-4">
        @forelse($matches as $match)
            @php
                $user    = $match['influencer'];
                $profile = $match['profile'];
                $metrics = $profile->metrics ?? [];
                $niches  = $metrics['niches'] ?? [];
                $platforms = $metrics['platforms'] ?? [];
                $avgReach  = $metrics['avg_reach'] ?? 0;
                $er        = $metrics['engagement_rate'] ?? 0;
            @endphp

            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-5 flex items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="h-12 w-12 rounded-full bg-primaryLight flex items-center justify-center text-primary font-bold">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-900">{{ $user->name }}</p>
                        <p class="text-xs text-slate-500 mb-1">
                            {{ number_format($avgReach) }} avg reach · {{ number_format($er, 1) }}% ER
                        </p>

                        <p class="text-xs text-slate-500">
                            Niches:
                            @forelse($niches as $n)
                                <span class="px-2 py-1 bg-slate-100 rounded-full text-[10px] text-slate-600 mr-1">
                                    {{ $n }}
                                </span>
                            @empty
                                <span class="text-slate-400">No niches set</span>
                            @endforelse
                        </p>

                        <p class="text-xs text-slate-500 mt-1">
                            Platforms:
                            @forelse($platforms as $p)
                                <span class="px-2 py-1 bg-slate-100 rounded-full text-[10px] text-slate-600 mr-1">
                                    {{ ucfirst($p) }}
                                </span>
                            @empty
                                <span class="text-slate-400">No platforms set</span>
                            @endforelse
                        </p>
                    </div>
                </div>

                <div class="text-right">
                    <p class="text-xs text-slate-500 mb-1">Match Score</p>
                    <p class="text-3xl font-bold text-primary leading-none">
                        {{ $match['score'] }}
                    </p>

                    <a href="{{ route('campaigns.view.influencer', $campaign) }}"
                       class="inline-block mt-3 px-4 py-2 rounded-full bg-primary text-white text-xs font-semibold hover:bg-primaryDark">
                        View as influencer
                    </a>
                </div>
            </div>
        @empty
            <p class="text-xs text-slate-400 mt-4">
                No influencers found yet. Ask creators to complete their onboarding first.
            </p>
        @endforelse
    </div>
</x-layouts.app>
