<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="viho admin template">
  <meta name="author" content="pixelstrap">
  <link rel="icon" href="images/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
  <title>Register - OnlineVote</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">

  <!-- CSS -->
  <link rel="stylesheet" href="css/fontawesome.css">
  <link rel="stylesheet" href="css/icofont.css">
  <link rel="stylesheet" href="css/themify.css">
  <link rel="stylesheet" href="css/flag-icon.css">
  <link rel="stylesheet" href="css/feather-icon.css">
  <link rel="stylesheet" href="css/sweetalert2.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link id="color" rel="stylesheet" href="css/color-1.css" media="screen">
  <link rel="stylesheet" href="css/responsive.css">
</head>
<body>

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
            <form class="theme-form login-form">
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
                <button class="btn btn-primary btn-block" type="submit">Create Account</button>
              </div>

              <p>Already have an account?<a class="ms-2" href="login.html">Sign in</a></p>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- JS -->
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/icons/feather-icon/feather.min.js"></script>
  <script src="js/icons/feather-icon/feather-icon.js"></script>
  <script src="js/sidebar-menu.js"></script>
  <script src="js/config.js"></script>
  <script src="js/bootstrap/popper.min.js"></script>
  <script src="js/bootstrap/bootstrap.min.js"></script>
  <script src="js/sweet-alert/sweetalert.min.js"></script>
  <script src="js/script.js"></script>

</body>
</html>
