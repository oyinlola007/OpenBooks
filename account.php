<?php
$title = "My account";
include_once 'layouts/header.php';
?>

<section class="my-5 py-5">
  <div class="row container mx-auto text-white">
    <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
      <h3 class="font-weight-bold">Account Info</h3>
      <hr class="mx-auto">
      <div class="account-info">
        <p>Name<span>John</span></p>
        <p>Email<span>test@example.com</span></p>
        <p><a href="" id="my-books-btn">My books</a></p>
        <p><a href="" id="logout-btn">Logout</a></p>
      </div>
    </div>

    <div class="col-lg-6 col-md-12 col-sm-12">
      <form id="account-form">
        <h3>Change password</h3>
        <hr class="mx-auto">
        <div class="form-group">
          <Label>Password</Label>
          <input type="password" class="form-control" id="account-password" name="password" placeholder="Password" />
        </div>
        <div class="form-group">
          <Label>Confirm Password</Label>
          <input type="password" class="form-control" id="account-confirm-password" name="confirm-password" placeholder="Password" />
        </div>
        <div class="form-group">
          <input type="submit" value="Change Password" class="btn" id="change-pass-btn" />
        </div>
      </form>
    </div>

  </div>
</section>

<?php include_once 'layouts/footer.php'; ?>
