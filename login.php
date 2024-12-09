<?php

$title = "Login";
include_once 'layouts/header.php';

if (isset($_SESSION['logged_in'])){
  // redirect the user if they are logged in
  header('location: account.php');
}
?>

<section class="my-5 py-5">
  <div class="container text-center mt-3 pt-5">

    <!-- if a message is sent, display it-->
    <?php include_once 'layouts/alert.php'; ?>

    <h2 class="font-weight-bold">Login</h2>
    <hr class="mx-auto">
  </div>
  <div class="mx-auto container text-white">
    <form id="login-form" method="POST" action="server/handle_login.php">
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" id="login-email" name="email" placeholder="Email" required />
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required />
      </div>
      <div class="form-group">
        <input type="submit" class="btn" id="login-btn" name="login_btn" value="Login" />
      </div>
      <div class="form-group">
        <a id="register-url" class="btn" href="register.php">Don't have an account? Register</a>
      </div>
    </form>
  </div>
</section>


<?php include_once 'layouts/footer.php'; ?>
