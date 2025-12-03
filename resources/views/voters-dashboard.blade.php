@extends('layouts.app')

@section('title', 'Voters Dashboard')
@section('content')

<!-- Loader -->
<div class="loader-wrapper">
    <div class="theme-loader"></div>
</div>

<div class="page-wrapper compact-sidebar" id="pageWrapper">
    <div class="sidebar-icon">
        <div class="mt-5 mx-5">
            <div class="container-fluid">

                <h1 class="mb-4 fw-bold">Dashboard Overview</h1>

                <div class="row g-4 align-items-stretch">

                    <!-- LEFT PROFILE -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card p-3 h-100" style="background:#325246; color:white; border-radius:12px;">
                            <h6 class="fw-bold mb-1">Hi, {{ $user?->name ?? 'Guest' }}</h6>
                            <p class="text-white-50 small mb-3">{{ $user?->email ?? '-' }} | {{ $user?->gender ?? '-' }}</p>

                            <div class="p-3" style="background:#b1d4c7; border-radius:12px;">
                                <p class="mb-2 fw-semibold text-dark">Recent Activity</p>

                                <div class="small">
                                    @forelse($recentVotes as $v)
                                    <p class="mb-1">{{ optional($v->election)->name ?? 'Election' }}: <span class="fw-bold">Voted on {{ $v->cast_at?->format('M d, Y H:i') }}</span></p>
                                    @if(!$loop->last)
                                    <hr>
                                    @endif
                                    @empty
                                    <p class="mb-1">Belum ada aktivitas</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT CONTENT (full height 2 cards + button) -->
                    <div class="col-lg-8 col-md-6 d-flex">

                        <!-- WRAPPER FULL HEIGHT -->
                        <div class="w-100 d-flex flex-column h-100">

                            <!-- CARDS ROW FULL HEIGHT -->
                            <div class="row g-4 align-items-stretch flex-grow-1">

                                <!-- CARD 1 -->
                                <div class="col-lg-6 col-md-6 d-flex">
                                    <div class="card p-3 text-center h-100 w-100"
                                        style="background:#325246; color:white; border-radius:12px;">

                                        <div class="p-3 h-100 d-flex flex-column justify-content-center"
                                            style="background:#b1d4c7; border-radius:12px;">

                                            <p class="mb-2 fw-semibold text-dark">Total Election Joined</p>
                                            <p class="mb-1">
                                                <img src="{{ asset('images/caleg/vote.svg') }}" width="35">
                                                <span class="fw-bold text-dark">{{ $stats['totalElectionJoined'] ?? 0 }} Votes</span>
                                            </p>
                                        </div>

                                    </div>
                                </div>

                                <!-- CARD 2 -->
                                <div class="col-lg-6 col-md-6 d-flex">
                                    <div class="card p-3 text-center h-100 w-100"
                                        style="background:#325246; color:white; border-radius:12px;">

                                        <div class="p-3 h-100 d-flex flex-column justify-content-center"
                                            style="background:#b1d4c7; border-radius:12px;">

                                            <p class="mb-2 fw-semibold text-dark">Total Votes Cast</p>
                                            <p class="mb-1">
                                                <img src="{{ asset('images/voter/user-check.svg') }}" width="35">
                                                <span class="fw-bold text-dark">{{ $stats['totalVotesCast'] ?? 0 }} Registered Votes</span>
                                            </p>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <!-- BUTTON ALWAYS AT BOTTOM -->
                            <div class="mt-3 text-end">
                                <a href="/" class="btn btn-dark px-4 py-2" style="border-radius:12px;">Back to Home</a>
                            </div>

                        </div>
                    </div>

                </div>


                <hr class="my-5">

                <!-- TITLE -->
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h5 class="fw-bold m-0">Election In Progress</h5>

                    <div class="input-group" style="width: 250px;">
                        <span class="input-group-text">
                            <i class="bi bi-search"></i>
                        </span>
                        <input id="votersSearch" type="text" class="form-control" placeholder="Search...">
                    </div>

                </div>



                <!-- ELECTION CARDS -->
                <div id="electionsRow" class="row g-4">
                    @foreach($activeElections as $election)
                    <div class="col-xl-4 col-md-6">
                        <div class="card shadow-sm h-100" style="border-radius:12px;">

                            <!-- HEADER -->
                            <div class="text-center p-3">
                                <h6 class="fw-bold m-0">{{ $election->name }}</h6>
                            </div>

                            <!-- IMAGE -->
                            <img src="{{ $election && $election->candidates->first()->image_path ? (\Illuminate\Support\Str::startsWith($election->candidates->first()->image_path, ['http', '/storage']) ? $election->candidates->first()->image_path : Storage::url(trim($election->candidates->first()->image_path, '/'))) : asset('images/caleg/caleg.png') }}"
                                class="card-img-top"
                                style="border-radius:12px; padding:40px 40px 0 40px;">

                            <!-- BODY -->
                            <div class="card-body text-center">
                                <p class="fw-bold m-0">Top Candidate</p>
                                <p class="m-0 fw-semibold" style="font-size:20px;">{{ optional($topCandidates[$election->id])->name ?? '—' }}</p>
                                <p class="text-muted small">{{ optional($topCandidates[$election->id])->votes_count ?? 0 }} Votes</p>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var input = document.getElementById('votersSearch');
        var container = document.getElementById('electionsRow');
        if (!input || !container) return;
        var cards = Array.prototype.slice.call(container.querySelectorAll('.col-xl-4.col-md-6'));
        input.addEventListener('input', function() {
            var q = (input.value || '').trim().toLowerCase();
            cards.forEach(function(card) {
                var nameEl = card.querySelector('.text-center h6');
                var name = nameEl ? String(nameEl.textContent || '').toLowerCase() : '';
                var show = q === '' || name.indexOf(q) !== -1;
                card.style.display = show ? '' : 'none';
            });
        });
    });
</script>

@endsection