<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Election;
use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function dashboard()
    {
        $elections = Election::where('status', '!=', 'done')->orderByDesc('start_at')->take(6)->get();
        $votedElectionIds = [];
        if (Auth::check()) {
            $votedElectionIds = Vote::where('user_id', Auth::id())->pluck('election_id')->unique()->toArray();
        }
        $previewCandidates = [];
        $previewUrls = [];
        foreach ($elections as $election) {
            $withImage = Candidate::where('election_id', $election->id)
                ->whereNotNull('image_path')
                ->orderBy('position_id')
                ->orderBy('id')
                ->first();
            $previewCandidates[$election->id] = $withImage ?: Candidate::where('election_id', $election->id)
                ->orderBy('position_id')
                ->orderBy('id')
                ->first();

            $url = null;
            if ($withImage && $withImage->image_path) {
                $p = $withImage->image_path;
                $relative = str_starts_with($p, 'storage/') ? substr($p, 8) : $p;
                if (Storage::disk('public')->exists($relative)) {
                    $url = Storage::disk('public')->url($relative);
                }
            }
            $previewUrls[$election->id] = $url;
        }
        return view('dashboard', compact('elections', 'previewCandidates', 'previewUrls', 'votedElectionIds'));
    }

    public function votePage(Request $request)
    {
        $electionId = (int) $request->query('election_id');
        $election = $electionId ? Election::find($electionId) : Election::where('status', 'active')->orderBy('start_at')->first();
        $candidates = $election ? Candidate::where('election_id', $election->id)->with('position')->orderBy('position_id')->get() : collect();
        return view('vote-page', compact('election', 'candidates'));
    }

    public function votersDashboard(Request $request)
    {
        $user = $request->user();
        $votes = $user ? Vote::where('user_id', $user->id)->with('election')->orderByDesc('cast_at')->get() : collect();
        $stats = [
            'totalElectionJoined' => $votes->pluck('election_id')->unique()->count(),
            'totalVotesCast' => $votes->count(),
        ];
        $activeElections = Election::where('status', 'active')->orderByDesc('start_at')->take(6)->get();

        $topCandidates = [];
        $topCandidateUrls = [];
        foreach ($activeElections as $election) {
            $top = Candidate::where('election_id', $election->id)
                ->withCount('votes')
                ->orderByDesc('votes_count')
                ->first();
            $topCandidates[$election->id] = $top;

            $url = null;
            if ($top && $top->image_path) {
                $p = $top->image_path;
                $relative = str_starts_with($p, 'storage/app/public/') ? substr($p, 18) : $p;
                if (Storage::disk('public')->exists($relative)) {
                    $url = Storage::disk('public')->url($relative);
                }
            }
            $topCandidateUrls[$election->id] = $url;
        }

        $recentVotes = $votes->take(3);

        return view('voters-dashboard', compact('stats', 'activeElections', 'recentVotes', 'topCandidates', 'topCandidateUrls', 'user'));
    }

    public function adminDashboard()
    {
        $stats = [
            'totalElections' => Election::count(),
            'activeElections' => Election::where('status', 'active')->count(),
            'totalVotes' => Vote::count(),
            'totalCandidates' => Candidate::count(),
        ];

        $elections = Election::withCount('votes')
            ->orderByDesc('created_at')
            ->get();

        $topCandidates = [];
        foreach ($elections as $election) {
            $topCandidates[$election->id] = Candidate::where('election_id', $election->id)
                ->withCount('votes')
                ->orderByDesc('votes_count')
                ->first();
        }

        return view('admin', compact('stats', 'elections', 'topCandidates'));
    }

    public function adminAnalytics(Request $request)
    {
        $electionId = (int) $request->query('election_id');
        $elections = Election::orderBy('name')->get(['id', 'name']);

        $revenueTotal = (int) User::whereNotNull('registration_fee')->sum('registration_fee');

        $revenueByDay = User::select(DB::raw('DATE(created_at) as day'), DB::raw('SUM(COALESCE(registration_fee,0)) as total'))
            ->groupBy('day')
            ->orderBy('day')
            ->get()
            ->map(fn ($row) => ['day' => $row->day, 'total' => (int) $row->total])
            ->all();

        $votesQuery = Vote::query();
        if ($electionId) {
            $votesQuery->where('election_id', $electionId);
        }
        $votesTotal = (int) $votesQuery->count();
        $votesByDay = $votesQuery->select(DB::raw('DATE(cast_at) as day'), DB::raw('COUNT(*) as total'))
            ->groupBy('day')
            ->orderBy('day')
            ->get()
            ->map(fn ($row) => ['day' => $row->day, 'total' => (int) $row->total])
            ->all();

        return response()->json([
            'elections' => $elections,
            'revenue_total' => $revenueTotal,
            'revenue_by_day' => $revenueByDay,
            'votes_total' => $votesTotal,
            'votes_by_day' => $votesByDay,
        ]);
    }

    public function adminManage()
    {
        $elections = Election::orderByDesc('created_at')->get();
        return view('admin-manage', compact('elections'));
    }
}
