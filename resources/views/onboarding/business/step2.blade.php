<x-app title="Business Onboarding – Step 2">
    <div class="max-w-2xl mx-auto py-10">
        <x-stepper :steps="['Business Info','Goals']" :active="2" />

        <form method="POST" action="{{ route('business.step2.submit') }}" class="space-y-5">
            @csrf

            <div>
                <label class="font-semibold">Marketing Goals</label>
                <textarea name="marketing_goals" class="w-full border rounded-lg p-2" rows="3"></textarea>
            </div>

            <div>
                <label class="font-semibold">Budget (optional)</label>
                <input type="number" name="budget" class="w-full border rounded-lg p-2">
            </div>

            <button class="px-6 py-3 bg-primary text-white rounded-xl w-full">Finish</button>
        </form>
    </div>
</x-app>
