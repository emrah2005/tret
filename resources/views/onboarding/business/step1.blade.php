<x-app title="Business Onboarding – Step 1">
    <div class="max-w-2xl mx-auto py-10">
        <x-stepper :steps="['Business Info','Goals']" :active="1" />

        <form method="POST" action="{{ route('business.step1.submit') }}" class="space-y-5">
            @csrf

            <div>
                <label class="font-semibold">Business Name</label>
                <input type="text" name="business_name" class="w-full border rounded-lg p-2">
            </div>

            <div>
                <label class="font-semibold">Industry</label>
                <input type="text" name="industry" class="w-full border rounded-lg p-2">
            </div>

            <div>
                <label class="font-semibold">Contact Email</label>
                <input type="email" name="contact_email" class="w-full border rounded-lg p-2">
            </div>

            <div>
                <label class="font-semibold">Phone</label>
                <input type="text" name="contact_phone" class="w-full border rounded-lg p-2">
            </div>

            <div>
                <label class="font-semibold">Website (optional)</label>
                <input type="text" name="website" class="w-full border rounded-lg p-2">
            </div>

            <button class="px-6 py-3 bg-primary text-white rounded-xl w-full">Continue</button>
        </form>
    </div>
</x-app>
