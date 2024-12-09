<?php

$title = "Register";
include_once 'layouts/header.php';

if ($_SESSION['logged_in']){
  // redirect the user if they are logged in
  header('location: account.php');
}
?>


<section class="my-5 py-5">
  <div class="container text-center mt-3 pt-5">

    <!-- if a message is sent, display it-->
    <?php include_once 'layouts/alert.php'; ?>

    <h2 class="font-weight-bold">Register</h2>
    <hr class="mx-auto">
  </div>
  <div class="mx-auto container text-white">
    <form id="register-form" method="POST" action="server/handle_registration.php" enctype="multipart/form-data">

      <div class="form-group mb-3">
        <label>Name</label>
        <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required />
      </div>

      <div class="form-group mb-3">
        <label>Email</label>
        <input type="email" class="form-control" id="register-email" name="email" placeholder="Email" required />
      </div>

      <div class="form-group mb-3">
        <label>Password</label>
        <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required />
      </div>

      <div class="form-group mb-3">
        <label>Confirm Password</label>
        <input type="password" class="form-control" id="register-confirm-password" name="confirmPassword" placeholder="Confirm Password" required />
      </div>

      <div class="form-group mb-3">
        <label>Select Profile Picture</label>
        <input class="form-control" type="file" accept="image/png, image/gif, image/jpeg" id="photo" name="photo" required>
      </div>

      <div class="form-group">
        <input type="submit" class="btn" id="register-btn" name="register" value="Register" />
      </div>

      <div class="form-group">
        <a href="login.php" id="login-url" class="btn">Do you have an account? Login</a>
      </div>
    </form>
  </div>
</section>


<?php include_once 'layouts/footer.php'; ?>