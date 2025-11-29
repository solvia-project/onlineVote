@extends('layouts.app')

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
                    <h5 class="fw-bold m-0">Pemilihan Kepala Daerah Jakarta</h5>

                    <p class="m-0">
                        Category :
                        <span class="badge bg-success">Politik</span>
                    </p>
                </div>

                <!-- 3 CARDS -->
                <div class="row g-4">

                    <!-- CARD TEMPLATE -->
                    @foreach([1,2,3] as $num)
                    <div class="col-xl-4 col-md-6">
                        <div class="card shadow-sm position-relative" style="border-radius:12px;">

                            <!-- LABEL -->
                            <h1 class=" text-center m-2">
                                1
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
                                <button class="btn btn-primary btn-vote" data-candidate="{{ $num }}">
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
document.addEventListener("DOMContentLoaded", function () {

    // SELECT semua tombol Vote Now
    const voteButtons = document.querySelectorAll(".btn-vote");

    // Bootstrap modal instance
    const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
    const successModal = new bootstrap.Modal(document.getElementById('successModal'));

    let selectedCandidate = null;

    // Saat tombol vote diklik → buka modal confirm
    voteButtons.forEach(btn => {
        btn.addEventListener("click", function () {
            selectedCandidate = this.dataset.candidate;
            confirmModal.show();
        });
    });

    // Saat user klik YES → tutup confirm → buka success
    document.getElementById("confirmYes").addEventListener("click", function () {
        confirmModal.hide();

        setTimeout(() => {
            successModal.show();
        }, 300);
    });

});
</script>

@endsection
