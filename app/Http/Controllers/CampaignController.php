<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index(Request $request)
    {
        return Campaign::with('brand')->latest()->paginate(15);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Campaign::class);

        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'brief'      => 'nullable|string',
            'budget'     => 'nullable|numeric|min:0',
            'currency'   => 'nullable|string|max:10',
            'start_date' => 'nullable|date',
            'end_date'   => 'nullable|date|after_or_equal:start_date',
        ]);

        $data['brand_id'] = $request->user()->id;
        $data['status']   = 'draft';

        $campaign = Campaign::create($data);

        return response()->json($campaign, 201);
    }

    public function show($id)
    {
        return Campaign::with(['brand', 'offers.influencer'])->findOrFail($id);
    }
}
