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
        <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0">
                    <h5>Manage Election</h5>

                  </div>

                  <div class="card-body">
                    <div class="mb-4">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addElectionModal">
                            + Add Election
                        </button>
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
                                <div class="row-3">
                                    <button
                                        class="btn btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editElectionModal">
                                        Edit
                                    </button>
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
                                <div  class="row-3">
                                    <button
                                        class="btn btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editElectionModal">
                                        Edit
                                    </button>
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
                                <div  class="row-3">
                                    <button
                                        class="btn btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editElectionModal">
                                        Edit
                                    </button>
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

    {{-- Modal Add Election --}}
<div class="modal fade" id="addElectionModal" tabindex="-1" aria-labelledby="addElectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Add New Election</h5>
            </div>

            <form action="#" method="POST" enctype="multipart/form-data" class="theme-form">
                @csrf

                <div class="modal-body">

                    {{-- ROW: TITLE + CATEGORY --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="fw-bold">Judul</label>
                            <input type="text" name="title" class="form-control" placeholder="Masukkan judul election" required>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold">Kategori</label>
                            <input type="text" name="category" class="form-control" placeholder="Masukkan kategori" required>
                        </div>
                    </div>

                    {{-- DESCRIPTION --}}
                    <div class="mb-4">
                        <label class="fw-bold">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Masukkan deskripsi"></textarea>
                    </div>

                    {{-- START & DEADLINE --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Start Date</label>
                            <input type="datetime-local" name="start_date" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Deadline</label>
                            <input type="datetime-local" name="deadline" class="form-control" required>
                        </div>
                    </div>

                    {{-- STATUS --}}
                    <div class="mb-4">
                        <label class="fw-bold">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="upcoming">Upcoming</option>
                            <option value="active">Active</option>
                            <option value="done">Done</option>
                        </select>
                    </div>

                    {{-- CANDIDATE SECTION --}}
                    <h6 class="fw-bold mt-4 mb-3">Add Candidate</h6>

                    {{-- Candidate item --}}
                    <div id="candidateWrapper">

                        <div class="candidate-item border rounded p-3 mb-4">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="fw-bold">Candidate Name</label>
                                    <input name="candidate_name[]" class="form-control" required placeholder="Masukkan nama kandidat">
                                </div>

                                <div class="col-md-6">
                                    <label class="fw-bold">Upload Image</label>
                                    <input type="file" name="candidate_image[]" class="form-control" accept="image/*" required>
                                </div>
                            </div>

                            <label class="fw-bold">Candidate Description</label>
                            <textarea name="candidate_description[]" class="form-control" rows="3" placeholder="Deskripsi kandidat"></textarea>
                        </div>

                    </div>

                    <button type="button" class="btn btn-primary" id="addMoreCandidate">+ Add More Candidate</button>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>

        </div>
    </div>
</div>

{{-- Modal Edit Election --}}
<div class="modal fade" id="editElectionModal" tabindex="-1" aria-labelledby="editElectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Add New Election</h5>
            </div>

            <form action="#" method="POST" enctype="multipart/form-data" class="theme-form">
                @csrf

                <div class="modal-body">

                    {{-- ROW: TITLE + CATEGORY --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="fw-bold">Judul</label>
                            <input type="text" name="title" class="form-control" placeholder="Masukkan judul election" required>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold">Kategori</label>
                            <input type="text" name="category" class="form-control" placeholder="Masukkan kategori" required>
                        </div>
                    </div>

                    {{-- DESCRIPTION --}}
                    <div class="mb-4">
                        <label class="fw-bold">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Masukkan deskripsi"></textarea>
                    </div>

                    {{-- START & DEADLINE --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Start Date</label>
                            <input type="datetime-local" name="start_date" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Deadline</label>
                            <input type="datetime-local" name="deadline" class="form-control" required>
                        </div>
                    </div>

                    {{-- STATUS --}}
                    <div class="mb-4">
                        <label class="fw-bold">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="upcoming">Upcoming</option>
                            <option value="active">Active</option>
                            <option value="done">Done</option>
                        </select>
                    </div>

                    {{-- CANDIDATE SECTION --}}
                    <h6 class="fw-bold mt-4 mb-3">Add Candidate</h6>

                    {{-- Candidate item --}}
                    <div id="candidateWrapper">

                        <div class="candidate-item border rounded p-3 mb-4">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="fw-bold">Candidate Name</label>
                                    <input name="candidate_name[]" class="form-control" required placeholder="Masukkan nama kandidat">
                                </div>

                                <div class="col-md-6">
                                    <label class="fw-bold">Upload Image</label>
                                    <input type="file" name="candidate_image[]" class="form-control" accept="image/*" required>
                                </div>
                            </div>

                            <label class="fw-bold">Candidate Description</label>
                            <textarea name="candidate_description[]" class="form-control" rows="3" placeholder="Deskripsi kandidat"></textarea>
                        </div>

                    </div>

                    <button type="button" class="btn btn-primary" id="addMoreCandidate">+ Add More Candidate</button>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>

            </form>

        </div>
    </div>
</div>




@endsection
