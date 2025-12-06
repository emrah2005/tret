<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Campaign;
use App\Models\Payment;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    // Influencer sends an offer / applies
    public function store(Request $request, $campaignId)
    {
        $request->user()->can('apply', Campaign::findOrFail($campaignId));

        $data = $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        $offer = Offer::create([
            'campaign_id'   => $campaignId,
            'influencer_id' => $request->user()->id,
            'amount'        => $data['amount'],
            'status'        => 'pending',
        ]);

        return response()->json($offer, 201);
    }

    // Brand accepts an offer
    public function accept(Request $request, $offerId)
    {
        $offer = Offer::with('campaign')->findOrFail($offerId);

        if ($request->user()->id !== $offer->campaign->brand_id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $offer->status = 'accepted';
        $offer->save();

        Payment::create([
            'campaign_id'   => $offer->campaign_id,
            'brand_id'      => $request->user()->id,
            'influencer_id' => $offer->influencer_id,
            'amount'        => $offer->amount,
            'provider'      => 'manual',
            'status'        => 'escrowed',
        ]);

        return response()->json($offer);
    }
}
