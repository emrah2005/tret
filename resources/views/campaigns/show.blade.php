<x-layouts.app :title="$campaign->name . ' - Campaign Details'">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <p class="text-xs text-slate-500 mb-1">Campaign</p>
            <h1 class="text-2xl font-semibold text-slate-900">
                {{ $campaign->name }}
            </h1>
        </div>

        <div class="flex items-center gap-3">

            {{-- Matches Button --}}
            <a href="{{ route('campaigns.matches', $campaign) }}"
               class="px-4 py-2 rounded-full bg-primary text-white text-xs font-semibold hover:bg-primaryDark">
                View Matches
            </a>

            {{-- Edit --}}
            <a href="{{ route('campaigns.edit', $campaign) }}"
               class="px-4 py-2 rounded-full border border-slate-300 text-xs font-semibold text-slate-700 hover:bg-slate-50">
                Edit
            </a>
        </div>
    </div>

    {{-- Success message --}}
    @if(session('success'))
        <div class="mb-4 text-xs text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-xl px-3 py-2">
            {{ session('success') }}
        </div>
    @endif


    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- LEFT COLUMN --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Brief --}}
            <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6">
                <h2 class="text-sm font-semibold text-slate-900 mb-2">Brief</h2>

                <p class="text-sm text-slate-600 whitespace-pre-line">
                    {{ $campaign->brief ?: 'No brief provided.' }}
                </p>
            </div>


            {{-- Offers --}}
            <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6">
                <h2 class="text-sm font-semibold text-slate-900 mb-3">Offers & Applications</h2>

                @if($campaign->offers->isEmpty())
                    <p class="text-xs text-slate-400">No creator applications yet.</p>
                @else
                    <div class="space-y-4">

                        @foreach($campaign->offers as $offer)
                            <div class="flex items-start justify-between border border-slate-200 rounded-2xl px-4 py-3">

                                <div>
                                    <p class="text-sm font-semibold text-slate-900">
                                        {{ $offer->influencer->name }}
                                    </p>

                                    <p class="text-xs text-slate-500">
                                        {{ $offer->notes ?: 'No notes added.' }}
                                    </p>
                                </div>

                                <div class="text-right">
                                    <p class="text-xs font-semibold text-slate-900">
                                        {{ $offer->amount ? number_format($offer->amount, 0) . ' ' . $offer->currency : '-' }}
                                    </p>

                                    <p class="text-xs text-slate-500 capitalize">
                                        {{ $offer->status }}
                                    </p>
                                </div>

                            </div>
                        @endforeach

                    </div>
                @endif
            </div>

        </div>


        {{-- RIGHT COLUMN --}}
        <div class="space-y-6">

            {{-- Overview --}}
            <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 text-xs">
                <h2 class="text-sm font-semibold text-slate-900 mb-3">Overview</h2>

                <p class="text-xs text-slate-500 mb-1">Budget</p>
                <p class="text-sm font-semibold text-slate-900 mb-3">
                    {{ $campaign->budget ? number_format($campaign->budget, 0) . ' ' . $campaign->currency : 'Not set' }}
                </p>

                <p class="text-xs text-slate-500 mb-1">Period</p>
                <p class="text-sm text-slate-900 mb-3">
                    {{ $campaign->start_date ? $campaign->start_date->format('d M Y') : '—' }}
                    –
                    {{ $campaign->end_date ? $campaign->end_date->format('d M Y') : '—' }}
                </p>

                <p class="text-xs text-slate-500 mb-1">Status</p>
                <p class="px-2 py-1 rounded-full bg-slate-100 text-slate-700 inline-block">
                    {{ ucfirst($campaign->status) }}
                </p>
            </div>

        </div>

    </div>

</x-layouts.app>
