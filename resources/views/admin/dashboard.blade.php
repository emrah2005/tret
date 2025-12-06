<x-layouts.app title="Admin Dashboard - Influentia">
    <h1 class="text-2xl lg:text-3xl font-semibold text-slate-900 mb-2">
        Admin Dashboard
    </h1>
    <p class="text-sm text-slate-500 mb-6">
        Overview of users and profiles on Influentia.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-2xl p-4 shadow border border-slate-100">
            <p class="text-xs text-slate-500 mb-1">Total Users</p>
            <p class="text-2xl font-semibold text-slate-900">{{ $usersCount }}</p>
        </div>

        <div class="bg-white rounded-2xl p-4 shadow border border-slate-100">
            <p class="text-xs text-slate-500 mb-1">Influencers</p>
            <p class="text-2xl font-semibold text-slate-900">{{ $influencersCount }}</p>
        </div>

        <div class="bg-white rounded-2xl p-4 shadow border border-slate-100">
            <p class="text-xs text-slate-500 mb-1">Brands</p>
            <p class="text-2xl font-semibold text-slate-900">{{ $brandsCount }}</p>
        </div>

        <div class="bg-white rounded-2xl p-4 shadow border border-slate-100">
            <p class="text-xs text-slate-500 mb-1">Profiles</p>
            <p class="text-2xl font-semibold text-slate-900">{{ $profilesCount }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl p-4 shadow border border-slate-100">
            <h2 class="text-sm font-semibold text-slate-800 mb-3">Recent Influencers</h2>
            <div class="space-y-2 text-xs">
                @forelse($influencerProfiles as $p)
                    <div class="flex items-center justify-between border-b border-slate-100 pb-2 last:border-0 last:pb-0">
                        <div>
                            <p class="font-semibold text-slate-900">
                                {{ $p->user->name ?? 'User #'.$p->user_id }}
                            </p>
                            <p class="text-slate-500">
                                {{ implode(', ', $p->metrics['niches'] ?? []) ?: 'No niches' }}
                            </p>
                        </div>
                        <span class="text-slate-400">
                            #{{ $p->id }}
                        </span>
                    </div>
                @empty
                    <p class="text-slate-400">No influencer profiles yet.</p>
                @endforelse
            </div>
        </div>

        <div class="bg-white rounded-2xl p-4 shadow border border-slate-100">
            <h2 class="text-sm font-semibold text-slate-800 mb-3">Recent Brands</h2>
            <div class="space-y-2 text-xs">
                @forelse($businessProfiles as $p)
                    <div class="flex items-center justify-between border-b border-slate-100 pb-2 last:border-0 last:pb-0">
                        <div>
                            <p class="font-semibold text-slate-900">
                                {{ $p->metrics['company_name'] ?? $p->user->name ?? 'Brand #'.$p->user_id }}
                            </p>
                            <p class="text-slate-500">
                                {{ $p->metrics['industry'] ?? 'Unknown industry' }}
                            </p>
                        </div>
                        <span class="text-slate-400">
                            #{{ $p->id }}
                        </span>
                    </div>
                @empty
                    <p class="text-slate-400">No business profiles yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts.app>
