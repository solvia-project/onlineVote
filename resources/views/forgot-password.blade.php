@extends('layouts.app')

@section('title', 'Forgot Password')
@section('content')
<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="theme-loader">
        <div class="loader-p"></div>
    </div>
</div>
<!-- Loader ends-->
<!-- page-wrapper Start-->
<section>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div class="login-main">
                        <form class="theme-form login-form">
                            <h4 class="mb-3">Forgot Password</h4>
                            <div class="form-group">
                                <label>Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><img src="{{ asset('images/login/email.png') }}" alt=""></i></span>
                                    <input type="email" class="form-control" required placeholder="email@mail.com">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                                    <div class="show-hide"><span class="show"></span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Retype Password</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Reset Password &rightarrow;</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- page-wrapper end-->
<!-- latest jquery-->
<script src="js/jquery-3.5.1.min.js"></script>
<!-- feather icon js-->
<script src="js/icons/feather-icon/feather.min.js"></script>
<script src="js/icons/feather-icon/feather-icon.js"></script>
<!-- Sidebar jquery-->
<script src="js/sidebar-menu.js"></script>
<script src="js/config.js"></script>
<!-- Bootstrap js-->
<script src="js/bootstrap/popper.min.js"></script>
<script src="js/bootstrap/bootstrap.min.js"></script>
<!-- Plugins JS start-->
<script src="js/sweet-alert/sweetalert.min.js"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="js/script.js"></script>
<!-- login js-->
<!-- Plugin used-->
</body>
@endsection
