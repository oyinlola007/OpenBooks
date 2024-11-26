<?php
$title = "Register";
include_once 'layouts/header.php';
?>

<section class="my-5 py-5">
  <div class="container text-center mt-3 pt-5">
    <h2 class="font-weight-bold">Register</h2>
    <hr class="mx-auto">
  </div>
  <div class="mx-auto container text-white">
    <form id="register-form">
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required />
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" id="register-email" name="email" placeholder="Email" required />
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required />
      </div>

      <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" class="form-control" id="register-confirm-password" name="confirm-password" placeholder="Confirm Password" required />
      </div>

      <div class="form-group">
        <input type="submit" class="btn" id="register-btn" value="Register" />
      </div>

      <div class="form-group">
        <a id="login-url" class="btn">Do you have an account? Login</a>
      </div>
    </form>
  </div>
</section>


<?php include_once 'layouts/footer.php'; ?>