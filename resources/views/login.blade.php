@extends('layouts.app')

@section('content')
<!-- Loader Start -->
<div class="loader-wrapper">
    <div class="theme-loader">
        <div class="loader-p"></div>
    </div>
</div>
<!-- Loader End -->

<section>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="login-card">
                    <form class="theme-form login-form">
                        @csrf
                        <h4>Login</h4>
                        <h6>Welcome! Log in to Vote.</h6>

                        <div class="form-group">
                            <label>Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <img src="{{ asset('images/login/email.png') }}" alt="">
                                </span>
                                <input type="email" name="email" class="form-control" required placeholder="email@mail.com" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <img src="{{ asset('images/login/lock.png') }}" alt="">
                                </span>
                                <input type="password" name="password" class="form-control" required placeholder="enter password">
                                <div class="show-hide">
                                    <img src="{{ asset('images/login/eye.png') }}" alt="" class="show">
                                </div>
                            </div>
                        </div>

                        <div class="form-group d-flex align-items-center gap-2">
                            <p>Forgot password? <a class="link" href="/forgot-password">Click Here.</a></p>
                        </div>

                        <button class="btn btn-primary btn-block" type="submit">Sign in</button>

                        <p class="mt-3">
                            Have account yet?
                            <a href="/register">Register here.</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
