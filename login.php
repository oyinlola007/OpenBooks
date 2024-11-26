<?php
$title = "Login";
include_once 'layouts/header.php';
?>

<section class="my-5 py-5">
  <div class="container text-center mt-3 pt-5">
    <h2 class="font-weight-bold">Login</h2>
    <hr class="mx-auto">
  </div>
  <div class="mx-auto container text-white">
    <form id="login-form">
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" id="login-email" name="email" placeholder="Email" required />
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required />
      </div>
      <div class="form-group">
        <input type="submit" class="btn" id="login-btn" value="Login" />
      </div>
      <div class="form-group">
        <a id="register-url" class="btn">Don't have an account? Regtster</a>
      </div>
    </form>
  </div>
</section>


<?php include_once 'layouts/footer.php'; ?>
