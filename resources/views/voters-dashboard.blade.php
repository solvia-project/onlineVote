@extends('layouts.app')

@section('content')

<!-- Loader -->
<div class="loader-wrapper">
    <div class="theme-loader"></div>
</div>

<div class="page-wrapper compact-sidebar" id="pageWrapper">

    <!-- PAGE BODY -->
    <div class="page-body-wrapper sidebar-icon">
        <div class="mt-5 mx-5">
            <div class="container-fluid">
                <div class="row align-items-start">
                    <h1 class="my-4">Dashboard Overview</h1>
                    <!-- LEFT CLOCK PANEL -->
                    <div class="col-xl-3 col-lg-4 col-md-5 mb-4">
                        <div class="card p-3" style="background:#325246; color:white; border-radius:12px;">
                            <h6 class="fw-bold text-white mb-2">Hi, Ainun Faturrahman</h6>
                                <p class="text-white-50 mb-3">fatur@gmail.com | C182040933121</p>
                                <div style="background:#b1d4c7;border-radius:12px;padding:0px 10px">
                                    <p class="text-white-50 mb-3">Recent Activity</p>
                                    <p>Election A: Voted on August 10 2025</p>
                                    <hr>
                                    <p>Election B: Voted on July 22 2025</p>
                                    <hr>
                                    <p>Election C: Voted on June 15 2025</p>
                                </div>
                        </div>
                    </div>

                    <!-- RIGHT VOTE PANEL -->
                    <div class="col-xl-3 col-lg-4 col-md-5 mb-4">
                        <div class="card p-3" style="background:#325246; color:white; border-radius:12px;">
                            <h6 class="fw-bold text-white mb-2">Total Election Joined</h6>
                                <div style="background:#b1d4c7;border-radius:12px;padding:0px 10px; display:flex; align-items:center; gap:10px;">
                                    <img src="{{ asset('images/caleg/vote.svg') }}" alt="">
                                    <p class="">20 <span>Voters</span></p>
                                </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-5 mb-4">
                        <div class="card p-3" style="background:#325246; color:white; border-radius:12px;">
                            <h6 class="fw-bold text-white mb-2">Total Election Joined</h6>
                                <div style="background:#b1d4c7;border-radius:12px;padding:0px 10px; display:flex; align-items:center; gap:10px;">
                                    <img src="{{ asset('images/caleg/vote.svg') }}" alt="">
                                    <p class="">20 <span>Voters</span></p>
                                </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <!-- TITLE CENTER -->
                <h5 class="text-center fw-bold mb-4">Election In Progress</h5>

                <!-- 3 CARDS -->
                <div class="row g-4">

                    <!-- CARD TEMPLATE -->
                    @foreach([1,2,3] as $num)
                    <div class="col-xl-4 col-md-6">
                        <div class="card shadow-sm position-relative" style="border-radius:12px;">

                            <!-- LABEL -->
                            <h1 class=" text-center m-2">
                                Election 1 Top Candidate
                            </h1>

                            <!-- IMAGE -->
                            <img
                                src="{{ asset('images/caleg/caleg.png') }}"
                                class="card-img-top"
                                alt="Candidate"
                                style="border-top-left-radius:12px; border-top-right-radius:12px; padding:40px 40px 0 40px"
                            >
                            <!-- CARD BODY -->
                            <div class="card-body text-center">
                                <p class="fw-bold m-0">Nurhadi & Aldo</p>
                                <p>1000.000.000</p>
                                <p class="text-muted small m-0">Votes</p>
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
