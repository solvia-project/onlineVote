@extends('layouts.app')

@section('title', 'Admin Manage')
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
                <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"> </i></div>
            </div>
            <div class="nav-right col pull-right right-menu p-0">
                <ul class="nav-menus">
                    <li class="onhover-dropdown p-0">
                        <button class="btn btn-primary-light btn-logout" type="button"><i data-feather="log-out"></i>Log out</button>
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
                <img class="img-90 rounded-circle" src="{{ asset('images/dashboard/boy-2.png') }}" alt="Avatar" />
                <a href="user-profile">
                    <h6 class="mt-3 f-14 f-w-600">{{ Auth::check() ? Auth::user()->name : 'User' }}</h6>
                </a>
                <p class="mb-0 font-roboto">{{ ucfirst(Auth::check() ? (Auth::user()->role ?? 'user') : 'user') }}</p>

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
                                                <th>No</th>
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
                                            @foreach($elections as $election)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $election->name }}</td>
                                                <td>{{ $election->category ?? '-' }}</td>
                                                <td>{{ $election->description ?? '-' }}</td>
                                                <td>{{ $election->start_at }}</td>
                                                <td>{{ $election->end_at }}</td>
                                                <td>
                                                    @php $st=$election->status; @endphp
                                                    <div class="btn {{ $st==='active' ? 'btn-success' : ($st==='done' ? 'btn-dark' : 'btn-primary') }}">{{ ucfirst($st) }}</div>
                                                </td>
                                                <td>
                                                    <div class="row-3">
                                                        @php
                                                        $startInput = $election->start_at ? \Illuminate\Support\Carbon::parse($election->start_at)->format('Y-m-d\TH:i') : '';
                                                        $endInput = $election->end_at ? \Illuminate\Support\Carbon::parse($election->end_at)->format('Y-m-d\TH:i') : '';
                                                        @endphp
                                                        <button class="btn btn-primary btn-edit"
                                                            data-id="{{ $election->id }}"
                                                            data-name="{{ $election->name }}"
                                                            data-category="{{ $election->category }}"
                                                            data-description="{{ $election->description }}"
                                                            data-start="{{ $startInput }}"
                                                            data-end="{{ $endInput }}"
                                                            data-status="{{ $election->status }}">Edit</button>
                                                        <button class="btn btn-dark btn-deactive" data-id="{{ $election->id }}">Deactive</button>
                                                        <button class="btn btn-danger btn-delete" data-id="{{ $election->id }}">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
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

                    <form action="{{ url('/admin/elections') }}" method="POST" enctype="multipart/form-data" class="theme-form">
                        @csrf

                        <div class="modal-body">

                            {{-- ROW: TITLE + CATEGORY --}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="fw-bold">Judul</label>
                                    <input type="text" name="name" class="form-control" placeholder="Masukkan judul election" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="fw-bold">Kategori</label>
                                    <input type="text" name="category" class="form-control" placeholder="Masukkan kategori">
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
                                    <input type="datetime-local" name="start_at" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Deadline</label>
                                    <input type="datetime-local" name="end_at" class="form-control">
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
                                            <input name="candidate_name[]" class="form-control" placeholder="Masukkan nama kandidat">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="fw-bold">Upload Image</label>
                                            <input type="file" name="candidate_image[]" class="form-control" accept="image/*">
                                            <img class="img-preview mt-2" style="max-height:100px; border-radius:8px; display:none;" />
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

                    <form id="editForm" action="#" method="POST" enctype="multipart/form-data" class="theme-form">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">

                            {{-- ROW: TITLE + CATEGORY --}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="fw-bold">Judul</label>
                                    <input type="text" name="name" class="form-control" placeholder="Masukkan judul election" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="fw-bold">Kategori</label>
                                    <input type="text" name="category" class="form-control" placeholder="Masukkan kategori">
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
                                    <input type="datetime-local" name="start_at" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Deadline</label>
                                    <input type="datetime-local" name="end_at" class="form-control">
                                </div>
                            </div>

                            {{-- STATUS --}}
                            <div class="mb-4">
                                <label class="fw-bold">Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="draft">Draft</option>
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
                                            <input type="file" name="candidate_image[]" class="form-control" accept="image/*">
                                            <img class="img-preview mt-2" style="max-height:100px; border-radius:8px; display:none;" />
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
        @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const editButtons = document.querySelectorAll('.btn-edit');
                const editModal = new bootstrap.Modal(document.getElementById('editElectionModal'));
                const editForm = document.getElementById('editForm');
                const getToken = () => document.querySelector('#addElectionModal form input[name="_token"]').value;

                function attachPreview(scope) {
                    const inputs = (scope || document).querySelectorAll('input[type="file"][name="candidate_image[]"]');
                    inputs.forEach(input => {
                        input.addEventListener('change', e => {
                            const file = e.target.files && e.target.files[0];
                            const img = e.target.closest('.candidate-item')?.querySelector('.img-preview');
                            if (file && img) {
                                img.src = URL.createObjectURL(file);
                                img.style.display = 'block';
                            }
                        });
                    });
                }
                attachPreview();

                editButtons.forEach(btn => {
                    btn.addEventListener('click', () => {
                        const id = btn.dataset.id;
                        editForm.action = `/admin/elections/${id}`;
                        editForm.querySelector('input[name="name"]').value = btn.dataset.name || '';
                        editForm.querySelector('input[name="category"]').value = btn.dataset.category || '';
                        editForm.querySelector('textarea[name="description"]').value = btn.dataset.description || '';
                        editForm.querySelector('input[name="start_at"]').value = btn.dataset.start || '';
                        editForm.querySelector('input[name="end_at"]').value = btn.dataset.end || '';
                        const statusSelect = editForm.querySelector('select[name="status"]');
                        statusSelect.value = btn.dataset.status || 'draft';
                        renderEditCandidates(id);
                        editModal.show();
                    });
                });

                function renderEditCandidates(electionId) {
                    const wrapper = document.querySelector('#editElectionModal #candidateWrapper');
                    if (!wrapper) return;
                    wrapper.innerHTML = '';
                    fetch(`/elections/${electionId}/candidates`).then(r => r.json()).then(list => {
                        list.forEach(c => {
                            const item = document.createElement('div');
                            item.className = 'candidate-item border rounded p-3 mb-4';
                            item.innerHTML = `
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="fw-bold">Candidate Name</label>
                                        <input name="candidate_name[]" class="form-control" placeholder="Masukkan nama kandidat">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="fw-bold">Upload Image</label>
                                        <input type="file" name="candidate_image[]" class="form-control" accept="image/*">
                                        <img class="img-preview mt-2" style="max-height:100px; border-radius:8px; display:none;" />
                                    </div>
                                </div>
                                <label class="fw-bold">Candidate Description</label>
                                <textarea name="candidate_description[]" class="form-control" rows="3" placeholder="Deskripsi kandidat"></textarea>
                            `;
                            wrapper.appendChild(item);
                            const nameInput = item.querySelector('input[name="candidate_name[]"]');
                            const descInput = item.querySelector('textarea[name="candidate_description[]"]');
                            const imgEl = item.querySelector('.img-preview');
                            if (nameInput) nameInput.value = c.name || '';
                            if (descInput) descInput.value = c.bio || '';
                            const p = c.image_path || '';
                            let url = '';
                            if (p) {
                                url = (p.startsWith('http') || p.startsWith('/storage')) ? p : ('/storage/' + p);
                                imgEl.src = url;
                                imgEl.style.display = 'block';
                            }
                            attachPreview(item);
                        });
                    }).catch(() => {});
                }

                document.querySelectorAll('.btn-deactive').forEach(btn => {
                    btn.addEventListener('click', () => {
                        const id = btn.dataset.id;
                        const f = document.createElement('form');
                        f.method = 'POST';
                        f.action = `/admin/elections/${id}`;
                        const csrf = document.createElement('input');
                        csrf.type = 'hidden';
                        csrf.name = '_token';
                        csrf.value = getToken();
                        f.appendChild(csrf);
                        const method = document.createElement('input');
                        method.type = 'hidden';
                        method.name = '_method';
                        method.value = 'PUT';
                        f.appendChild(method);
                        const status = document.createElement('input');
                        status.type = 'hidden';
                        status.name = 'status';
                        status.value = 'done';
                        f.appendChild(status);
                        document.body.appendChild(f);
                        f.submit();
                    });
                });

                document.querySelectorAll('.btn-delete').forEach(btn => {
                    btn.addEventListener('click', () => {
                        if (!confirm('Delete this election and all related data?')) return;
                        const id = btn.dataset.id;
                        const f = document.createElement('form');
                        f.method = 'POST';
                        f.action = `/admin/elections/${id}`;
                        const csrf = document.createElement('input');
                        csrf.type = 'hidden';
                        csrf.name = '_token';
                        csrf.value = getToken();
                        f.appendChild(csrf);
                        const method = document.createElement('input');
                        method.type = 'hidden';
                        method.name = '_method';
                        method.value = 'DELETE';
                        f.appendChild(method);
                        document.body.appendChild(f);
                        f.submit();
                    });
                });

                document.querySelectorAll('.btn-logout').forEach(btn => {
                    btn.addEventListener('click', () => {
                        const form = document.getElementById('logout-form');
                        if (form) {
                            form.submit();
                            return;
                        }
                        const f = document.createElement('form');
                        f.method = 'POST';
                        f.action = '/logout';
                        const csrf = document.createElement('input');
                        csrf.type = 'hidden';
                        csrf.name = '_token';
                        csrf.value = getToken();
                        f.appendChild(csrf);
                        document.body.appendChild(f);
                        f.submit();
                    });
                });

                const addBtn = document.getElementById('addMoreCandidate');
                if (addBtn) {
                    addBtn.addEventListener('click', () => {
                        const wrapper = document.querySelector('#addElectionModal #candidateWrapper');
                        const last = wrapper.querySelector('.candidate-item:last-child');
                        const clone = last.cloneNode(true);
                        clone.querySelectorAll('input, textarea').forEach(el => {
                            el.value = '';
                        });
                        const img = clone.querySelector('.img-preview');
                        if (img) {
                            img.src = '';
                            img.style.display = 'none';
                        }
                        wrapper.appendChild(clone);
                        attachPreview(clone);
                    });
                }
            });
        </script>
        @endpush