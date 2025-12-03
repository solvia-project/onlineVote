<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Election;
use App\Models\Position;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index(Election $election)
    {
        return response()->json($election->candidates()->with(['position'])->withCount(['votes'])->get());
    }

    public function store(Request $request, Election $election)
    {
        $data = $request->validate([
            'position_id' => ['required', 'integer', 'exists:positions,id'],
            'name' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'image_path' => ['nullable', 'string', 'max:1024'],
        ]);

        $position = Position::findOrFail($data['position_id']);
        if ($position->election_id !== $election->id) {
            return response()->json(['message' => 'Position does not belong to election'], 422);
        }

        $candidate = $election->candidates()->create($data);
        return response()->json(['data' => $candidate], 201);
    }

    public function show(Candidate $candidate)
    {
        $candidate->load(['election', 'position', 'votes']);
        return response()->json($candidate);
    }

    public function update(Request $request, Candidate $candidate)
    {
        $data = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'image_path' => ['nullable', 'string', 'max:1024'],
        ]);
        $candidate->update($data);
        return response()->json(['data' => $candidate]);
    }

    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return response()->noContent();
    }
}
