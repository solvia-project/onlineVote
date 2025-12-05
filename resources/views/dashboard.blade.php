@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')

<!-- Loader -->
<div class="loader-wrapper">
    <div class="theme-loader"></div>
</div>

<div class="page-wrapper compact-sidebar" id="pageWrapper">
    <div class="sidebar-icon">

        <div class="mt-5 mx-5">
            <div class="container-fluid">

                <div class="row align-items-start">

                    <!-- LEFT CLOCK PANEL -->
                    <div class="col-xl-3 col-lg-4 col-md-5 mb-4">
                        <div class="card p-3" style="background:#325246; color:white; border-radius:12px;">

                            <h6 class="fw-bold text-white mb-1">Hi, {{ Auth::check() ? Auth::user()->name : 'Guest' }}</h6>
                            <p class="text-white-50 mb-3">Hari Gini Golput Ga Jaman!</p>

                            <div style="background:#b1d4c7; border-radius:12px;" class="p-2 text-center">
                                <p class="text-white-50">Welcome to Election Page</p>

                                <iframe src="https://free.timeanddate.com/clock/ia6pgnx8/n108/szw210/szh210/hocfff/hbw0/hfcb2d4c6/cf100/hgr0/fas20/fdi86/mqc000/mqs2/mql3/mqw4/mqd70/mhc000/mhs2/mhl3/mhw4/mhd70/mmv0/hhs3/hms3/hsc00f" frameborder="0" width="210" height="210"></iframe>
                                <p class="mt-3 text-white-50 text-center small">
                                    {{ now()->format('l, d F Y') }}
                                </p>
                            </div>


                        </div>
                    </div>

                    <!-- RIGHT VOTE PANEL — FULL WIDTH -->
                    <div class="col-xl-9 col-lg-8 col-md-7 mb-4">

                        <p class="text-uppercase small fw-bold mb-1">
                            Vote is important
                        </p>

                        <h3 class="fw-bold">It’s Time to Vote</h3>

                        <p class="text-muted mt-2">
                            By voting, individuals become part of the decision-making process that underlies
                            the functioning of government.
                        </p>

                        <a href="#voteTitle" class="btn btn-success mt-3">🗳 Vote Now</a>

                    </div>
                </div>

                <hr class="my-4">

                <!-- TITLE CENTER -->
                <h5 id="voteTitle" class="text-center fw-bold mb-4">Select Election To Vote!</h5>

                <!-- 3 CARDS -->
                <div class="row g-4">

                    @foreach($elections as $election)
                    @php($disabled = in_array($election->id, $votedElectionIds ?? []))
                    <div class="col-xl-4 col-md-6">
                        <div class="card shadow-sm position-relative" style="border-radius:12px; {{ $disabled ? 'opacity:0.45;' : '' }}">

                            <!-- LABEL -->
                            <span class="badge bg-success position-absolute top-0 end-0 m-2">
                                {{ $election->category ?? '—' }}
                            </span>

                            <!-- CARD BODY -->
                            <div class="card-body text-center">
                                <p class="fw-bold m-0">{{ $election->name }}</p>
                                <p class="text-muted small m-0">Deadline : {{ $election->end_at ? \Illuminate\Support\Carbon::parse($election->end_at)->format('d M Y H:i') : '—' }}</p>
                                <a class="btn btn-dark mt-2 {{ $disabled ? 'disabled' : '' }}"
                                   href="{{ $disabled ? 'javascript:void(0)' : (Auth::check() ? '/vote-page?election_id='.$election->id : route('login')) }}"
                                   {{ $disabled ? 'aria-disabled=true tabindex=-1 style=pointer-events:none;' : '' }}>Vote Now</a>
                            </div>

                        </div>
                    </div>
                    @endforeach

</div>


            </div>
        </div>

    </div>
</div>

@endsection
