<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusinessOnboardingController extends Controller
{
    /**
     * Base session key
     */
    protected string $sessionKey = 'onboarding.business';

    // =========================================
    // STEP 1 — Business details
    // =========================================
    public function step1()
    {
        $data = session($this->sessionKey . '.step1', []);

        return view('onboarding.business.step1', compact('data'));
    }

    public function submitStep1(Request $request)
    {
        $validated = $request->validate([
            'business_name'    => 'required|string|max:255',
            'industry'         => 'required|string|max:255',
            'contact_email'    => 'required|email',
            'contact_phone'    => 'required|string|max:50',
            'website'          => 'nullable|string|max:255',
        ]);

        session([$this->sessionKey . '.step1' => $validated]);

        return redirect()->route('business.step2');
    }

    // =========================================
    // STEP 2 — Goals & Budget
    // =========================================
    public function step2()
    {
        $data = session($this->sessionKey . '.step2', []);

        return view('onboarding.business.step2', compact('data'));
    }

    public function submitStep2(Request $request)
    {
        $validated = $request->validate([
            'marketing_goals'  => 'required|string|max:500',
            'budget'           => 'nullable|numeric|min:0',
        ]);

        session([$this->sessionKey . '.step2' => $validated]);

        // FINALIZE (eventually save to DB)
        session()->forget($this->sessionKey);

        return redirect()
            ->route('home')
            ->with('success', 'Your business onboarding is complete!');
    }
}
