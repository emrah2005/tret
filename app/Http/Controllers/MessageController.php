<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function send(Request $request, $threadId)
    {
        $data = $request->validate([
            'body' => 'required|string',
        ]);

        $thread = Thread::findOrFail($threadId);

        $message = Message::create([
            'thread_id' => $thread->id,
            'sender_id' => $request->user()->id,
            'body'      => $data['body'],
        ]);

        return response()->json($message, 201);
    }

    public function threadMessages($threadId)
    {
        return Message::where('thread_id', $threadId)
            ->with('sender')
            ->orderBy('created_at')
            ->get();
    }
}
