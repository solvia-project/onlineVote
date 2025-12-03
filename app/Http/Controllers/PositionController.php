<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Election;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(Election $election)
    {
        return response()->json($election->positions()->withCount(['candidates', 'votes'])->get());
    }

    public function store(Request $request, Election $election)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        $position = $election->positions()->create($data);
        return response()->json(['data' => $position], 201);
    }

    public function show(Position $position)
    {
        $position->load(['candidates', 'votes']);
        return response()->json($position);
    }

    public function update(Request $request, Position $position)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        $position->update($data);
        return response()->json(['data' => $position]);
    }

    public function destroy(Position $position)
    {
        $position->delete();
        return response()->noContent();
    }
}
