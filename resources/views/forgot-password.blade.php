@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')

<!-- Loader Start -->
<div class="loader-wrapper">
    <div class="theme-loader">
        <div class="loader-p"></div>
    </div>
</div>
<!-- Loader End -->

<section class="auth-section">
    <div class="container-fluid p-0">
        <div class="row justify-content-center align-items-center" style="min-height:100vh;">
            <div class="col-12">

                <div class="login-card">
                    <div class="login-main">

                        <form class="theme-form login-form" method="POST" action="#">
                            @csrf

                            <h4 class="mb-3">Forgot Password</h4>

                            {{-- Email --}}
                            <div class="form-group">
                                <label>Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <img src="{{ asset('images/login/email.png') }}" alt="">
                                    </span>
                                    <input type="email"
                                           name="email"
                                           class="form-control"
                                           required
                                           placeholder="email@mail.com">
                                </div>
                            </div>

                            {{-- New Password --}}
                            <div class="form-group">
                                <label>New Password</label>
                                <div class="input-group">

                                    <input type="password"
                                           name="new_password"
                                           id="new_password"
                                           class="form-control"
                                           required
                                           placeholder="********">

                                    <span class="input-group-text toggle-password"
                                          data-target="#new_password"
                                          style="cursor:pointer; background:white;">
                                        <img src="{{ asset('images/login/eye.png') }}" class="icon-eye" alt="show">
                                    </span>
                                </div>
                            </div>

                            {{-- Retype Password --}}
                            <div class="form-group">
                                <label>Retype Password</label>
                                <div class="input-group">

                                    <input type="password"
                                           name="confirm_password"
                                           id="confirm_password"
                                           class="form-control"
                                           required
                                           placeholder="********">

                                    <span class="input-group-text toggle-password"
                                          data-target="#confirm_password"
                                          style="cursor:pointer; background:white;">
                                        <img src="{{ asset('images/login/eye.png') }}" class="icon-eye" alt="show">
                                    </span>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <button class="btn btn-primary btn-block" type="submit">
                                    Reset Password →
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- Password Toggle Script --}}
<script>
    document.querySelectorAll('.toggle-password').forEach(btn => {
        btn.addEventListener('click', function () {
            let input = document.querySelector(this.dataset.target);
            let icon = this.querySelector('.icon-eye');

            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        });
    });
</script>

@push('styles')
<style>
    #app {
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }
    .auth-section {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endpush

@endsection
