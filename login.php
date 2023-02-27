<?php include 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>

  <!-- Font Icon -->
  <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">

  <!-- Main css -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

  <div class="main">

    <!-- Sing in  Form -->
    <section class="sign-in">
      <div class="container">
        <div class="signin-content">
          <div class="signin-image">
            <figure><img src="assets/images/atmajaya-logo.png" alt="sing up image"></figure>
          </div>
          <div class="signin-form">
            <h2 class="form-title">Log In</h2>
            <form method="POST" class="register-form" id="login-form" action="?act=login" method="post">
              <?php if ($_POST) include 'aksi.php'; ?>
              <div class="form-group">
                <label for="inputEmail"><i class="zmdi zmdi-account material-icons-name"></i></label>
                <input type="text" name="user" id="inputEmail" placeholder="Username" />
              </div>
              <div class="form-group">
                <label for="inputPassword"><i class="zmdi zmdi-lock"></i></label>
                <input type="password" name="pass" id="inputPassword" placeholder="Password" />
              </div>
              <div class="form-group form-button">
                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

  </div>
  <script type="text/javascript">
    $('.form-control').attr('autocomplete', 'off');
  </script>
  <!-- JS -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="assets/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>