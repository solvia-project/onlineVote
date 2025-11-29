@extends('layouts.app')

@section('content')
<!-- Loader -->
<div class="loader-wrapper">
    <div class="theme-loader">
        <div class="loader-p"></div>
    </div>
</div>

<section>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <form class="theme-form login-form" id="registerForm">
                        <h4>Registration</h4>
                        <h6>Welcome! Register to Vote</h6>

                        {{-- Name --}}
                        <div class="form-group">
                            <label>Your Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-user"></i></span>
                                <input class="form-control" type="text" required placeholder="Your Name">
                            </div>
                        </div>

                        {{-- Place of Birth --}}
                        <div class="form-group">
                            <label>Place of Birth</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-location-pin"></i></span>
                                <input class="form-control" type="text" required placeholder="Place of birth">
                            </div>
                        </div>

                        {{-- Date of Birth --}}
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                <input class="form-control" type="date" required>
                            </div>
                        </div>

                        {{-- Gender --}}
                        <div class="form-group">
                            <label>Gender</label>

                            <div class="d-flex gap-4 mt-1">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male">
                                    <label class="form-check-label" for="genderMale">
                                        Male
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female">
                                    <label class="form-check-label" for="genderFemale">
                                        Female
                                    </label>
                                </div>

                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="form-group">
                            <label>Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-email"></i></span>
                                <input class="form-control" type="email" required placeholder="example@email.com">
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-lock"></i></span>
                                <input class="form-control" type="password" required placeholder="********">
                                <div class="show-hide"><span class="show"></span></div>
                            </div>
                        </div>

                        {{-- Re-enter Password --}}
                        <div class="form-group">
                            <label>Re-Enter Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-lock"></i></span>
                                <input class="form-control" type="password" required placeholder="********">
                                <div class="show-hide"><span class="show"></span></div>
                            </div>
                        </div>

                        {{-- Registration Fee --}}
                        <div class="form-group">
                            <label>Registration Fee</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-credit-card"></i></span>
                                <input class="form-control" type="number" required placeholder="Enter fee amount">
                            </div>
                        </div>

                        {{-- Already have an account --}}
                        <div class="form-group">
                            <div>
                                <label class="text-muted">
                                    Already have an account?
                                    <a href="/login"> Click here.</a>
                                </label>
                            </div>
                        </div>

                        {{-- Button --}}
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="button" id="openConfirmModal">
                                Register →
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Confirm Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to create this account?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" id="confirmYes">Yes</button>
      </div>
    </div>
  </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Success</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Your account has been created successfully!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
    const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
    const successModal = new bootstrap.Modal(document.getElementById('successModal'));

    document.getElementById('openConfirmModal').addEventListener('click', function() {
        confirmModal.show();
    });

    document.getElementById('confirmYes').addEventListener('click', function() {
        confirmModal.hide();
        successModal.show();
    });
</script>
@endpush
@endsection
