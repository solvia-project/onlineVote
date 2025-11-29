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

                <div class="row align-items-start">

                    <!-- LEFT CLOCK PANEL -->
                    <div class="col-xl-3 col-lg-4 col-md-5 mb-4">
                        <div class="card p-3" style="background:#325246; color:white; border-radius:12px;">

                            <h6 class="fw-bold text-white mb-1">Hi, Ainun Faturrahman</h6>
                            <p class="text-white-50 mb-3">Hari Gini Golput Ga Jaman!</p>

                            <div style="background:#b1d4c7; border-radius:12px;" class="p-2 text-center">
                                <p class="text-white-50">Welcome to Election Page</p>

                                <iframe
                                    src="https://widgetbox.app/embed/clock/analog/3a7ca470-9b7c-4ba2-9571-f7a11be79b04"
                                    width="230" height="230"
                                    frameborder="0"
                                    style="border-radius:8px;">
                                </iframe>
                                <p class="mt-3 text-white-50 text-center small">
                                    Saturday, 17 November 2027
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

                        <button class="btn btn-success mt-3">🗳 Vote Now</button>

                    </div>
                </div>

                <hr class="my-4">

                <!-- TITLE CENTER -->
                <h5 class="text-center fw-bold mb-4">Select Election To Vote!</h5>

                <!-- 3 CARDS -->
                <div class="row g-4">

                    @foreach([1,2,3] as $num)
                    <div class="col-xl-4 col-md-6">
                        <div class="card shadow-sm position-relative" style="border-radius:12px;">

                            <!-- LABEL -->
                            <span class="badge bg-success position-absolute top-0 end-0 m-2">
                                Politik
                            </span>

                            <!-- IMAGE -->
                            <img
                                src="{{ asset('images/caleg/caleg.png') }}"
                                class="card-img-top"
                                alt="Candidate"
                                style="
                                    border-top-left-radius:12px;
                                    border-top-right-radius:12px;
                                    padding:40px 40px 0 40px;
                                "
                            >

                            <!-- CARD BODY -->
                            <div class="card-body text-center">
                                <p class="fw-bold m-0">Pemilihan Kepala Daerah Jakarta</p>
                                <p class="text-muted small m-0">Deadline : 14 Juli 2025</p>
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
