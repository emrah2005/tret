<x-layouts.app :title="'Business onboarding – Finish'">
    <div class="max-w-3xl mx-auto">
        <x-stepper :steps="['Business info', 'Audience', 'Finish']" :active="3" />

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 lg:p-8 text-center">
            <h1 class="text-xl font-semibold text-slate-900 mb-2">
                Business profile ready 🎉
            </h1>
            <p class="text-sm text-slate-500 mb-6">
                Finish onboarding and start creating campaigns to connect with the right creators.
            </p>

            <form method="POST" action="{{ route('business.finish') }}" class="space-y-6">
                @csrf

                <p class="text-sm text-slate-600">
                    You’ll be able to create campaigns and see recommended influencers based on your brand.
                </p>

                <div class="flex items-center justify-between">
                    <a href="{{ route('business.step2') }}"
                       class="text-xs text-slate-500 hover:text-slate-700">
                        ← Back
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-full bg-primary text-white px-6 py-2.5 text-sm font-semibold hover:bg-primaryDark"
                    >
                        Finish onboarding
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
