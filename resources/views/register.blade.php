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
                        <h4>Create your account</h4>
                        <h6>Enter your personal details to create account</h6>

                        <div class="form-group">
                            <label>Your Name</label>
                            <div class="small-group">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="icon-user"></i></span>
                                    <input class="form-control" type="text" required placeholder="First Name">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="icon-user"></i></span>
                                    <input class="form-control" type="text" required placeholder="Last Name">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-email"></i></span>
                                <input class="form-control" type="email" required placeholder="example@email.com">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-lock"></i></span>
                                <input class="form-control" type="password" required placeholder="********">
                                <div class="show-hide"><span class="show"></span></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <input id="checkbox1" type="checkbox">
                                <label for="checkbox1" class="text-muted">Agree with <span>Privacy Policy</span></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="button" id="openConfirmModal">Create Account</button>
                        </div>

                        <p>Already have an account?<a class="ms-2" href="/login">Sign in</a></p>
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
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
