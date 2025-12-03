@extends('layouts.app')

@section('title', 'Register')
@section('content')
<!-- Loader -->
<div class="loader-wrapper">
    <div class="theme-loader">
        <div class="loader-p"></div>
    </div>
</div>

<section class="auth-section">
    <div class="container-fluid p-0">
        <div class="row m-0 justify-content-center align-items-center" style="min-height:100vh;">
            <div class="col-12 p-0">
                <div class="login-card">
                    <form class="theme-form login-form" id="registerForm" method="POST" action="{{ route('register.store') }}">
                        @csrf
                        <h4>Registration</h4>
                        <h6>Welcome! Register to Vote</h6>

                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <strong>Please fix the following:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        {{-- Name --}}
                        <div class="form-group">
                            <label>Your Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-user"></i></span>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" required placeholder="Your Name" value="{{ old('name') }}">
                            </div>
                            @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Place of Birth --}}
                        <div class="form-group">
                            <label>Place of Birth</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-location-pin"></i></span>
                                <input class="form-control @error('place_of_birth') is-invalid @enderror" type="text" name="place_of_birth" required placeholder="Place of birth" value="{{ old('place_of_birth') }}">
                            </div>
                            @error('place_of_birth')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Date of Birth --}}
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                <input class="form-control @error('date_of_birth') is-invalid @enderror" type="date" name="date_of_birth" required value="{{ old('date_of_birth') }}">
                            </div>
                            @error('date_of_birth')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Gender --}}
                        <div class="form-group">
                            <label>Gender</label>

                            <div class="d-flex gap-4 mt-1">

                                <div class="form-check">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="genderMale" value="Male" {{ old('gender')==='Male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="genderMale">
                                        Male
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female" {{ old('gender')==='Female' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="genderFemale">
                                        Female
                                    </label>
                                </div>

                            </div>
                            @error('gender')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="form-group">
                            <label>Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-email"></i></span>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" required placeholder="example@email.com" value="{{ old('email') }}">
                            </div>
                            @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-lock"></i></span>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required placeholder="********">
                                <div class="show-hide"><span class="show"></span></div>
                            </div>
                            @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Re-enter Password --}}
                        <div class="form-group">
                            <label>Re-Enter Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-lock"></i></span>
                                <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" required placeholder="********">
                                <div class="show-hide"><span class="show"></span></div>
                            </div>
                            @error('password_confirmation')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Registration Fee --}}
                        <div class="form-group">
                            <label>Registration Fee</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-credit-card"></i></span>
                                <input class="form-control @error('registration_fee') is-invalid @enderror" type="number" name="registration_fee" value="10000" readonly min="10000" max="10000" step="1" placeholder="Registration fee">
                            </div>
                            @error('registration_fee')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
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
        document.getElementById('registerForm').submit();
    });
</script>
@endpush
@push('styles')
<style>
    #app {
        margin-top: 0 !important;
        margin-bottom: 0 !important
    }

    .auth-section {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center
    }
</style>
@endpush
@endsection