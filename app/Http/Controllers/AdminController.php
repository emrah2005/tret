<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'admin') {
            abort(403);
        }

        $usersCount          = User::count();
        $influencersCount    = User::where('role', 'influencer')->count();
        $brandsCount         = User::where('role', 'brand')->count();
        $profilesCount       = Profile::count();
        $influencerProfiles  = Profile::where('type', 'influencer')->latest()->take(20)->get();
        $businessProfiles    = Profile::where('type', 'business')->latest()->take(20)->get();

        return view('admin.dashboard', compact(
            'user',
            'usersCount',
            'influencersCount',
            'brandsCount',
            'profilesCount',
            'influencerProfiles',
            'businessProfiles'
        ));
    }
}
