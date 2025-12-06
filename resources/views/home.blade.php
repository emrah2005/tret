{{-- resources/views/home.blade.php --}}
<x-layouts.app>

    {{-- HERO SECTION --}}
    <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#6D35FF] via-[#A855F7] to-[#EC4899] text-white px-6 pt-14 pb-24 lg:px-16 lg:pt-20 lg:pb-28 mb-16">

        {{-- Top gradient strip --}}
        <img
            src="{{ asset('images/hWWkKUFrrbGljZDMTaK8_1764663412.png') }}"
            alt=""
            class="pointer-events-none absolute top-0 left-0 w-full opacity-70"
        >

        {{-- Floating blobs --}}
        <img
            src="{{ asset('images/FUt2SFbIIJb87VP3AmXo_1764663388.png') }}"
            alt=""
            class="pointer-events-none hidden md:block absolute left-[-40px] top-[120px] w-48"
        >
        <img
            src="{{ asset('images/IFLQwpUfpI8Hb1aLD6kz_1764663338.png') }}"
            alt=""
            class="pointer-events-none hidden md:block absolute right-[-20px] bottom-[40px] w-52"
        >

        <div class="relative grid gap-12 lg:grid-cols-2 lg:items-center">
            {{-- Left: Text --}}
            <div class="max-w-xl space-y-6">
                <p class="text-sm font-semibold tracking-[0.2em] uppercase text-violet-100">
                    Create your digital DNA
                </p>

                <h1 class="text-3xl lg:text-5xl font-bold leading-tight">
                    Match with brands and creators
                    <span class="block text-violet-100">that truly fit your vibe.</span>
                </h1>

                <p class="text-violet-100/90 text-sm lg:text-base max-w-lg">
                    Influentia analyzes your audience, content and campaign goals to connect
                    brands with the perfect influencers – no more random DMs or guessing.
                </p>

                {{-- CTAs --}}
                <div class="flex flex-wrap items-center gap-4">
                    <a href="{{ route('business.step1') }}"
                       class="inline-flex items-center justify-center rounded-full bg-white text-primary px-6 py-3 text-sm font-semibold shadow-lg shadow-violet-900/30">
                        I’m a Business
                    </a>

                    <a href="{{ route('influencer.step1') }}"
                       class="inline-flex items-center justify-center rounded-full border border-white/70 px-6 py-3 text-sm font-semibold text-white/90 backdrop-blur-sm">
                        I’m an Influencer
                    </a>

                    <p class="w-full text-xs text-violet-100/80 lg:w-auto">
                        Your profile helps us recommend the best matches on both sides.
                    </p>
                </div>
            </div>

            {{-- Right: Hero image --}}
            <div class="relative flex justify-center lg:justify-end">
                <img
                    src="{{ asset('images/EX3GB7rDcxtUwgCwE3DC_1764663367.png') }}"
                    alt="Creator using Influentia"
                    class="relative z-10 max-w-md w-full drop-shadow-2xl"
                >
            </div>
        </div>
    </section>


    {{-- DNA SECTION --}}
    <section class="relative mb-16 overflow-hidden rounded-3xl bg-slate-950 text-white">
        <img
            src="{{ asset('images/DhTAY9HVuAdWzDQHHCjv_1764663353.png') }}"
            alt=""
            class="absolute inset-0 h-full w-full object-cover opacity-70"
        >

        <div class="relative px-6 py-16 lg:px-16 lg:py-20">
            <div class="max-w-2xl">
                <p class="text-sm font-semibold tracking-[0.2em] uppercase text-violet-200">
                    Smart matching engine
                </p>
                <h2 class="mt-3 text-2xl lg:text-3xl font-bold">
                    Your digital DNA finds the right partnerships for you.
                </h2>
                <p class="mt-4 text-sm lg:text-base text-violet-100/90">
                    We analyze niches, audience demographics, engagement and campaign goals
                    to score compatibility between brands and creators. Better alignment,
                    better results, less waste.
                </p>
            </div>
        </div>
    </section>


    {{-- TESTIMONIALS SECTION --}}
    <section class="mb-16">
        <div class="flex flex-col lg:flex-row gap-10 items-center">
            <div class="flex-1 space-y-4">
                <p class="text-sm font-semibold tracking-[0.2em] uppercase text-primary">
                    What creators are saying
                </p>
                <h2 class="text-2xl lg:text-3xl font-bold text-slate-900">
                    Trusted by influencers who care about good brand fits.
                </h2>
                <p class="text-sm lg:text-base text-slate-600 max-w-xl">
                    From micro-influencers to niche creators, Influentia helps you find
                    campaigns that respect your audience and your style. No more sketchy offers,
                    just clear briefs and fair payments.
                </p>
            </div>

            <div class="flex-1 flex justify-center">
                <img
                    src="{{ asset('images/6bBMjlDTVTbcL6GMUBp0_1764663299 (1).png') }}"
                    alt="Creator style cards"
                    class="w-full max-w-xl drop-shadow-2xl rounded-[32px]"
                >
            </div>
        </div>
    </section>


    {{-- ROLE SELECTION SECTION --}}
    <section class="mb-20">
        <div class="grid gap-8 lg:grid-cols-2">
            {{-- Business card --}}
            <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm flex flex-col justify-between">
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-slate-900">
                        I’m a Business
                    </h3>
                    <p class="text-sm text-slate-600">
                        Find the perfect creators to represent your products and reach
                        new audiences with authentic content.
                    </p>
                    <ul class="space-y-2 text-sm text-slate-700">
                        <li>• Post detailed campaign briefs</li>
                        <li>• See recommended creators based on digital DNA</li>
                        <li>• Track applications, offers and performance</li>
                    </ul>
                </div>
                <div class="mt-6">
                    <a href="{{ route('business.step1') }}"
                       class="inline-flex items-center justify-center rounded-full bg-primary text-white px-6 py-3 text-sm font-semibold shadow-sm">
                        Create business profile
                    </a>
                </div>
            </div>

            {{-- Influencer card --}}
            <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm flex flex-col justify-between">
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-slate-900">
                        I’m an Influencer
                    </h3>
                    <p class="text-sm text-slate-600">
                        Connect with brands that match your audience, values and content
                        style – not just follower count.
                    </p>
                    <ul class="space-y-2 text-sm text-slate-700">
                        <li>• Build your digital DNA profile</li>
                        <li>• Apply only to campaigns that feel right</li>
                        <li>• Keep all briefs, deliverables and payments in one place</li>
                    </ul>
                </div>
                <div class="mt-6">
                    <a href="{{ route('influencer.step1') }}"
                       class="inline-flex items-center justify-center rounded-full border border-primary text-primary px-6 py-3 text-sm font-semibold">
                        Start influencer onboarding
                    </a>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>
