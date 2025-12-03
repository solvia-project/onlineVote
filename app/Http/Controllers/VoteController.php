<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Candidate;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index() {}

    public function store(Request $request)
    {
        $user = $request->user();
        $validated = $request->validate([
            'candidate_id' => ['required', 'integer', 'exists:candidates,id'],
        ]);

        $candidate = Candidate::with(['position', 'election'])->findOrFail($validated['candidate_id']);
        $election = $candidate->election;

        if (!$election || $election->status !== 'active') {
            return response()->json(['message' => 'Election not active'], 422);
        }

        $now = now();
        if ($election->start_at && $now->lt($election->start_at)) {
            return response()->json(['message' => 'Election has not started'], 422);
        }
        if ($election->end_at && $now->gt($election->end_at)) {
            return response()->json(['message' => 'Election has ended'], 422);
        }

        $positionId = $candidate->position_id;
        $already = Vote::where('user_id', $user->id)
            ->where('position_id', $positionId)
            ->exists();

        if ($already) {
            return response()->json(['message' => 'Already voted for this position'], 409);
        }

        $vote = Vote::create([
            'election_id' => $candidate->election_id,
            'position_id' => $positionId,
            'candidate_id' => $candidate->id,
            'user_id' => $user->id,
            'cast_at' => now(),
        ]);

        return response()->json(['data' => ['id' => $vote->id]], 201);
    }

    public function show(Vote $vote) {}

    public function update(Request $request, Vote $vote) {}

    public function destroy(Vote $vote) {}
}
