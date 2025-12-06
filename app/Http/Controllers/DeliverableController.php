<?php

namespace App\Http\Controllers;

use App\Models\Deliverable;
use App\Models\Payment;
use Illuminate\Http\Request;

class DeliverableController extends Controller
{
    // Influencer submits deliverable for a campaign
    public function submit(Request $request)
    {
        $data = $request->validate([
            'campaign_id' => 'required|integer|exists:campaigns,id',
            'file_url'    => 'required|string',
            'type'        => 'nullable|string|max:100',
            'due_at'      => 'nullable|date',
        ]);

        $deliverable = Deliverable::create([
            'campaign_id'   => $data['campaign_id'],
            'influencer_id' => $request->user()->id,
            'file_url'      => $data['file_url'],
            'type'          => $data['type'] ?? 'asset',
            'due_at'        => $data['due_at'] ?? null,
            'status'        => 'submitted',
        ]);

        return response()->json($deliverable, 201);
    }

    // Brand approves content and releases payment
    public function approve(Request $request, $id)
    {
        $deliverable = Deliverable::with('campaign')->findOrFail($id);

        if ($request->user()->id !== $deliverable->campaign->brand_id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $deliverable->status = 'approved';
        $deliverable->save();

        $payment = Payment::where('campaign_id', $deliverable->campaign_id)
            ->where('influencer_id', $deliverable->influencer_id)
            ->where('status', 'escrowed')
            ->first();

        if ($payment) {
            $payment->status = 'released';
            $payment->save();
        }

        return response()->json($deliverable);
    }
}

