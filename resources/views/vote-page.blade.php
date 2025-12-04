@extends('layouts.app')

@section('title', ($election ? ($election->name.' - Vote') : 'Vote'))
@section('content')

<!-- Loader -->
<div class="loader-wrapper">
    <div class="theme-loader"></div>
</div>

<div class="page-wrapper compact-sidebar" id="pageWrapper">

    <!-- PAGE BODY -->
    <div class="sidebar-icon">
        <div class="mt-5 mx-5">
            <div class="container-fluid">

                <!-- TITLE CENTER -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold m-0">{{ $election ? $election->name : 'Election' }}</h5>

                    <p class="m-0">
                        Category :
                        <span class="badge bg-success">{{ $election->category }}</span>
                    </p>
                </div>

                <!-- 3 CARDS -->
                <div class="row g-4">

                    <!-- CARD TEMPLATE -->
                    @foreach($candidates as $candidate)
                    <div class="col-xl-4 col-md-6">
                        <div class="card shadow-sm position-relative" style="border-radius:12px;">

                            <!-- LABEL -->
                            <h1 class=" text-center m-2">
                                {{ $loop->iteration }}
                            </h1>

                            <!-- IMAGE -->
                            <img
                                src="{{ $candidate && $candidate->image_path ? (\Illuminate\Support\Str::startsWith($candidate->image_path, ['http', '/storage']) ? $candidate->image_path : Storage::url(trim($candidate->image_path, '/'))) : asset('images/caleg/caleg.png') }}"
                                class="card-img-top"
                                alt="Candidate"
                                style="border-top-left-radius:12px; border-top-right-radius:12px; padding:40px 40px 0 40px">
                            <!-- CARD BODY -->
                            <div class="card-body text-center">
                                <p class="fw-bold m-0">{{ $candidate->name }}</p>
                                <p class="text-muted small m-0">{{ optional($candidate->position)->name }}</p>
                                @if($candidate->bio)
                                <p class="small mt-2">{{ $candidate->bio }}</p>
                                @endif
                                <button class="btn btn-primary btn-vote" data-candidate="{{ $candidate->id }}">
                                    Vote Now
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- CONFIRMATION MODAL -->
    <div class="modal fade" id="confirmModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Confirm Your Vote</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center">
                    <p>Are you sure you want to vote for this candidate?</p>
                </div>

                <div class="modal-footer justify-content-center">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button id="confirmYes" class="btn btn-primary">Yes</button>
                </div>

            </div>
        </div>
    </div>

    <!-- SUCCESS MODAL -->
    <div class="modal fade" id="successModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Success!</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center">
                    <p>Your vote has been submitted successfully.</p>
                </div>

                <div class="modal-footer justify-content-center">
                    <button class="btn btn-success" data-bs-dismiss="modal">OK</button>
                </div>

            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        // SELECT semua tombol Vote Now
        const voteButtons = document.querySelectorAll(".btn-vote");

        // Bootstrap modal instance
        const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
        const successModal = new bootstrap.Modal(document.getElementById('successModal'));

        let selectedCandidate = null;

        // Saat tombol vote diklik → buka modal confirm
        voteButtons.forEach(btn => {
            btn.addEventListener("click", function() {
                selectedCandidate = this.dataset.candidate;
                confirmModal.show();
            });
        });

        document.getElementById("confirmYes").addEventListener("click", function() {
            confirmModal.hide();
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch('/votes', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({
                    candidate_id: selectedCandidate
                })
            }).then(async (res) => {
                if (res.status === 201) {
                    successModal.show();
                    setTimeout(() => {
                        successModal.hide();
                        window.location.href = '/voters-dashboard';
                    }, 1500);
                } else if (res.status === 302 || res.status === 401 || res.redirected) {
                    window.location.href = '/login';
                } else {
                    let msg = 'Voting failed';
                    try {
                        const data = await res.json();
                        msg = data.message || msg;
                    } catch (e) {}
                    alert(msg);
                }
            }).catch(() => {
                alert('Network error');
            });
        });

    });
</script>

@endsection