<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Position;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class ElectionController extends Controller
{
    public function index()
    {
        return response()->json(Election::withCount(['positions', 'candidates', 'votes'])->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'start_at' => ['nullable', 'date'],
            'end_at' => ['nullable', 'date', 'after_or_equal:start_at'],
            'status' => ['required', 'in:draft,active,done'],
            'candidate_name' => ['sometimes', 'array'],
            'candidate_name.*' => ['nullable', 'string', 'max:255'],
            'candidate_description' => ['sometimes', 'array'],
            'candidate_description.*' => ['nullable', 'string'],
            'candidate_image' => ['sometimes', 'array'],
            'candidate_image.*' => ['nullable', 'image', 'max:4096'],
        ]);
        $election = DB::transaction(function () use ($data, $request) {
            $election = Election::create($data);

            $names = (array) $request->input('candidate_name', []);
            $descs = (array) $request->input('candidate_description', []);
            $files = (array) $request->file('candidate_image', []);

            // Filter hanya kandidat dengan nama terisi
            $validIndexes = [];
            foreach ($names as $idx => $n) {
                if (trim((string) $n) !== '') {
                    $validIndexes[] = $idx;
                }
            }

            if (count($validIndexes) > 0) {
                $position = Position::firstOrCreate([
                    'election_id' => $election->id,
                    'name' => 'General',
                ]);

                foreach ($validIndexes as $idx) {
                    $name = trim((string) $names[$idx]);
                    $bio = isset($descs[$idx]) ? (string) $descs[$idx] : null;
                    $imagePath = null;
                    $file = Arr::get($files, $idx);
                    if ($file) {
                        $safeName = Str::slug($name) ?: 'candidate';
                        $dir = "elections/{$election->id}/candidates/{$safeName}";
                        $stored = $file->store($dir, 'public');
                        $imagePath = $stored;
                    }

                    $existing = Candidate::where('position_id', $position->id)->where('name', $name)->first();
                    if ($existing) {
                        $existing->bio = $bio;
                        if ($imagePath) {
                            $existing->image_path = $imagePath;
                        }
                        $existing->save();
                    } else {
                        Candidate::create([
                            'election_id' => $election->id,
                            'position_id' => $position->id,
                            'name' => $name,
                            'bio' => $bio,
                            'image_path' => $imagePath,
                        ]);
                    }
                }
            }

            return $election;
        });
        if ($request->expectsJson()) {
            return response()->json(['data' => $election], 201);
        }
        return redirect('/admin/manage');
    }

    public function show(Election $election)
    {
        $election->load(['positions.candidates', 'candidates', 'votes']);
        return response()->json($election);
    }

    public function update(Request $request, Election $election)
    {
        $data = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'category' => ['sometimes', 'string', 'max:255'],
            'description' => ['sometimes', 'string'],
            'start_at' => ['nullable', 'date'],
            'end_at' => ['nullable', 'date', 'after_or_equal:start_at'],
            'status' => ['sometimes', 'in:draft,active,done'],
        ]);
        $election->update($data);
        if ($request->expectsJson()) {
            return response()->json(['data' => $election]);
        }
        return redirect('/admin/manage');
    }

    public function destroy(Election $election)
    {
        $election->load('candidates');
        foreach ($election->candidates as $c) {
            $path = $c->image_path;
            if ($path) {
                $relative = str_starts_with($path, 'storage/') ? substr($path, 8) : $path;
                if (Storage::disk('public')->exists($relative)) {
                    Storage::disk('public')->delete($relative);
                }
                $dir = dirname($relative);
                if ($dir && Storage::disk('public')->exists($dir)) {
                    Storage::disk('public')->deleteDirectory($dir);
                }
            }
        }
        Storage::disk('public')->deleteDirectory('elections/' . $election->id);
        $election->delete();
        if (request()->expectsJson()) {
            return response()->noContent();
        }
        return redirect('/admin/manage');
    }
}
