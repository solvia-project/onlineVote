@extends('layouts.app')

@section('content')
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader"></div>
    </div>
    <!-- Loader ends-->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-sidebar" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-main-header">
  <div class="main-header-right row m-0">
    <div class="main-header-left">
      <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle">    </i></div>
    </div>

    <div class="nav-right col pull-right right-menu p-0">
      <ul class="nav-menus">
        <li class="onhover-dropdown p-0">
          <button class="btn btn-primary-light" type="button"><i data-feather="log-out"></i>Log out</button>
        </li>
      </ul>
    </div>
    <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
  </div>
</div>
      <!-- Page Header Ends -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        </div>
      <!-- Page Header Ends -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        <header class="main-nav">
    <div class="sidebar-user text-center">
        <img class="img-90 rounded-circle" src="https://laravel.pixelstrap.com/viho/assets/images/dashboard/1.png" alt="" />
        <a href="user-profile"> <h6 class="mt-3 f-14 f-w-600">Emay Walter</h6></a>
        <p class="mb-0 font-roboto">Admin</p>

    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title active" href="/admin/dashboard"><i data-feather="home"></i><span>Dashboard</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="/admin/manage"><i data-feather="airplay"></i><span>Manage Election</span></a>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <!-- Container-fluid starts-->
                      <!-- Container-fluid starts-->
      <div class="container-fluid">

                <h1 class="mb-4 fw-bold">Dashboard</h1>

                <div class="row g-4 align-items-stretch">

                    <!-- LEFT PROFILE + ACTIVITY -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card p-3 h-100" style="background:#325246; color:white; border-radius:12px;">
                            <h6 class="fw-bold mb-1">Hi, Ainun Faturrahman</h6>
                            <p class="text-white-50 small mb-3">fatur@gmail.com • C182040933121</p>

                            <div class="p-3" style="background:#b1d4c7; border-radius:12px;">
                                <p class="mb-2 fw-semibold text-dark">Recent Activity</p>

                                <div class="small">
                                    <p class="mb-1">Election A: <span class="fw-bold">Voted • Aug 10, 2025</span></p>
                                    <hr>
                                    <p class="mb-1">Election B: <span class="fw-bold">Voted • Jul 22, 2025</span></p>
                                    <hr>
                                    <p class="mb-1">Election C: <span class="fw-bold">Voted • Jun 15, 2025</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TOTAL ELECTION JOINED -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card p-3 h-100 text-center" style="background:#325246; color:white; border-radius:12px;">
                            <h6 class="fw-bold mb-2">Total Election Joined</h6>

<div class="d-flex flex-column justify-content-center align-items-center text-center p-4"
     style="background:#b1d4c7; border-radius:12px; height: 150px;">

                                <img src="{{ asset('images/caleg/vote.svg') }}" width="40">
                                <div>
                                    <p class="m-0 fw-bold text-dark" style="font-size:22px;">20</p>
                                    <span class="text-dark-50 small">Times Participated</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TOTAL UPCOMING ELECTIONS -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card p-3 h-100 text-center" style="background:#325246; color:white; border-radius:12px;">
                            <h6 class="fw-bold mb-2">Upcoming Elections</h6>

                            <div class="d-flex justify-content-center align-items-center gap-3 p-3"
                                style="background:#b1d4c7; border-radius:12px;">
                                <img src="{{ asset('images/caleg/vote.svg') }}" width="40">
                                <div>
                                    <p class="m-0 fw-bold text-dark" style="font-size:22px;">5</p>
                                    <span class="text-dark-50 small">Scheduled Events</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <hr class="my-5">

                <!-- TITLE -->
                <h5 class="text-center fw-bold mb-4">Election In Progress</h5>

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
@endsection
