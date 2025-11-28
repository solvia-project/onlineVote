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
      <div class="logo-wrapper"><a href="https://laravel.pixelstrap.com/viho/dashboard"><img class="img-fluid" src="https://laravel.pixelstrap.com/viho/assets/images/logo/logo.png" alt=""></a></div>
      <div class="dark-logo-wrapper"><a href="https://laravel.pixelstrap.com/viho/dashboard"><img class="img-fluid" src="https://laravel.pixelstrap.com/viho/assets/images/logo/dark-logo.png" alt=""></a></div>
      <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle">    </i></div>
    </div>
    <div class="nav-right col pull-right right-menu p-0">
      <ul class="nav-menus">
        <li class="onhover-dropdown p-0">
          <button class="btn btn-primary-light" type="button"><i data-feather="log-out"></i>Log out</button>
        </li>
      </ul>
    </div>
  </div>
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
                        <a class="nav-link menu-title active"><i data-feather="home"></i><span>Dashboard</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title "><i data-feather="airplay"></i><span>Manage Election</span></a>
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
        <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0">
                    <h5>Manage Election</h5>

                  </div>

                  <div class="card-body">
                    <div class="mb-4">
                        <button class="btn btn-primary">+ Add Election</button>
                    </div>
                    <div class="table-responsive">
                      <table class="display" id="advance-1">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Description</th>
                            <th>Start</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Yono Ketoprak</td>
                            <td>Yono Ketoprak</td>
                            <td>Yono Ketoprak</td>
                            <td>19:15 2011/04/25</td>
                            <td>19:15 2011/04/25</td>
                            <td><div class="btn btn-primary">Upcoming</div></td>
                            <td>
                                <div class="col-3 flex">
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-dark">Deactive</button>
                                    <button class="btn btn-danger">Delete</button>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Yono Ketoprak</td>
                            <td>Yono Ketoprak</td>
                            <td>Yono Ketoprak</td>
                            <td>19:15 2011/04/25</td>
                            <td>19:15 2011/04/25</td>
                            <td><div class="btn btn-dark">Done</div></td>
                            <td>
                                <div class="col-3 flex">
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-dark">Deactive</button>
                                    <button class="btn btn-danger">Delete</button>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Yono Ketoprak</td>
                            <td>Yono Ketoprak</td>
                            <td>Yono Ketoprak</td>
                            <td>19:15 2011/04/25</td>
                            <td>19:15 2011/04/25</td>
                            <td><div class="btn btn-success">Active</div></td>
                            <td>
                                <div class="col-3 flex">
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-dark">Deactive</button>
                                    <button class="btn btn-danger">Delete</button>
                                </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection
