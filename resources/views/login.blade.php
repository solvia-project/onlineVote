<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>

    <link rel="icon" href="/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="/fonts/Montserrat.css" rel="stylesheet">
    <link href="/fonts/Roboto.css" rel="stylesheet">
    <link href="/fonts/Rubik.css" rel="stylesheet">

    <!-- Icons & CSS -->
    <link rel="stylesheet" href="/css/fontawesome.css">
    <link rel="stylesheet" href="/css/icofont.css">
    <link rel="stylesheet" href="/css/themify.css">
    <link rel="stylesheet" href="/css/flag-icon.css">
    <link rel="stylesheet" href="/css/feather-icon.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap.css">

    <!-- Main Style -->
    <link rel="stylesheet" href="/css/style.css">
    <link id="color" rel="stylesheet" href="/css/color-1.css">
    <link rel="stylesheet" href="/css/responsive.css">
</head>

<body>

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
                            <h4>Login</h4>
                            <h6>Welcome! Log in to Vote.</h6>

                            <div class="form-group">
                                <label>Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><img src="{{ asset('images/login/email.png') }}" alt=""></i></span>
                                    <input type="email" class="form-control" required placeholder="email@mail.com">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><img src="{{ asset('images/login/lock.png') }}" alt=""></span>
                                    <input type="password" class="form-control" required placeholder="enter password">
                                    <div class="show-hide">
                                        <img src="{{ asset('images/login/eye.png') }}" alt="" class="show">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group d-flex align-items-center gap-2">
                                <a class="link" href="forget-password.html">Forgot password?</a>
                                <a href="/forgot-password">Click here</a>
                            </div>

                            <button class="btn btn-primary btn-block" type="submit">Sign in</button>

                            <p class="mt-3">
                                Have account yet?
                                <a href="register">Register here.</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/icons/feather-icon/feather.min.js"></script>
    <script src="/js/icons/feather-icon/feather-icon.js"></script>
    <script src="/js/sidebar-menu.js"></script>
    <script src="/js/config.js"></script>
    <script src="/js/bootstrap/popper.min.js"></script>
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <script src="/js/script.js"></script>

</body>
</html>
