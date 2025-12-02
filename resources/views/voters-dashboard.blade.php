@extends('layouts.app')

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
                            <h6 class="fw-bold mb-1">Hi, Ainun Faturrahman</h6>
                            <p class="text-white-50 small mb-3">fatur@gmail.com | C182040933121</p>

                            <div class="p-3" style="background:#b1d4c7; border-radius:12px;">
                                <p class="mb-2 fw-semibold text-dark">Recent Activity</p>

                                <div class="small">
                                    <p class="mb-1">Election A: <span class="fw-bold">Voted on Aug 10, 2025</span></p>
                                    <hr>
                                    <p class="mb-1">Election B: <span class="fw-bold">Voted on Jul 22, 2025</span></p>
                                    <hr>
                                    <p class="mb-1">Election C: <span class="fw-bold">Voted on Jun 15, 2025</span></p>
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
                            <span class="fw-bold text-dark">20 Votes</span>
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
                            <span class="fw-bold text-dark">20 Registered Votes</span>
                        </p>
                    </div>

                </div>
            </div>

        </div>

        <!-- BUTTON ALWAYS AT BOTTOM -->
        <div class="mt-3 text-end">
            <button class="btn btn-dark px-4 py-2" style="border-radius:12px;" onclick="window.location='/dashboard'">
                Back to Home
            </button>
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
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>

                </div>



                <!-- ELECTION CARDS -->
                <div class="row g-4">
                    @foreach([1,2,3] as $num)
                        <div class="col-xl-4 col-md-6">
                            <div class="card shadow-sm h-100" style="border-radius:12px;">

                                <!-- HEADER -->
                                <div class="text-center p-3">
                                    <h6 class="fw-bold m-0">Election {{ $num }} — Top Candidate</h6>
                                </div>

                                <!-- IMAGE -->
                                <img src="{{ asset('images/caleg/caleg.png') }}"
                                     class="card-img-top"
                                     style="border-radius:12px; padding:40px 40px 0 40px;">

                                <!-- BODY -->
                                <div class="card-body text-center">
                                    <p class="fw-bold m-0">Nurhadi & Aldo</p>
                                    <p class="m-0 fw-semibold" style="font-size:20px;">1.000.000.000</p>
                                    <p class="text-muted small">Votes</p>
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
