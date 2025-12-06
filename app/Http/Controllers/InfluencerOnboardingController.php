<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class InfluencerOnboardingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function getOrCreateProfile()
    {
        $user = auth()->user();

        if (!$user->profile) {
            $user->profile()->create([
                'type' => 'influencer',
            ]);
            $user->refresh();
        }

        return $user->profile;
    }

    public function step1()
    {
        $this->getOrCreateProfile();
        return view('onboarding.influencer.step1');
    }

    public function submitStep1(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email',
            'phone'     => 'nullable|string|max:50',
            'location'  => 'nullable|string|max:255',
        ]);

        $user = auth()->user();
        $profile = $this->getOrCreateProfile();

        $user->email = $request->email;
        $user->save();

        $profile->full_name = $request->full_name;
        $profile->phone     = $request->phone;
        $profile->location  = $request->location;
        $profile->type      = 'influencer';
        $profile->save();

        return redirect()->route('influencer.step2');
    }

    public function step2()
    {
        $this->getOrCreateProfile();
        return view('onboarding.influencer.step2');
    }

    public function submitStep2(Request $request)
    {
        $request->validate([
            'categories' => 'required|array|min:1',
        ]);

        $profile = $this->getOrCreateProfile();
        $profile->categories = $request->categories;
        $profile->save();

        return redirect()->route('influencer.step3');
    }

    public function step3()
    {
        $this->getOrCreateProfile();
        return view('onboarding.influencer.step3');
    }

    public function submitStep3(Request $request)
    {
        $profile = $this->getOrCreateProfile();

        $profile->socials = [
            'instagram' => $request->instagram,
            'tiktok'    => $request->tiktok,
            'youtube'   => $request->youtube,
            'website'   => $request->website,
        ];
        $profile->save();

        return redirect()->route('influencer.step4');
    }

    public function step4()
    {
        $this->getOrCreateProfile();
        return view('onboarding.influencer.step4');
    }

    public function submitStep4(Request $request)
    {
        $request->validate([
            'followers'        => 'required|integer',
            'avg_views'        => 'required|integer',
            'engagement_rate'  => 'required|numeric',
        ]);

        $profile = $this->getOrCreateProfile();
        $profile->metrics = $request->only(['followers', 'avg_views', 'engagement_rate']);
        $profile->save();

        return redirect()->route('influencer.step5');
    }

    public function step5()
    {
        $this->getOrCreateProfile();
        return view('onboarding.influencer.step5');
    }

    public function submitStep5()
    {
        $user = auth()->user();
        $user->onboarding_completed = true;
        $user->save();

        return redirect()->route('influencer.step6');
    }

    public function step6()
    {
        return view('onboarding.influencer.step6');
    }
}
