<?php

$title = "My account";
include_once 'layouts/header.php';

if (!isset($_SESSION['logged_in'])){
  // redirect the user if they are not logged in
  header('location: login.php');
  exit();
}

if (isset($_GET['logout'])){
  if (isset($_SESSION['logged_in'])){
    session_destroy();
    header("location: login.php");
    exit();
  }
}

?>

<section class="my-5 py-5">
  <div class="row container mx-auto text-white mt-3 pt-5">

    <!-- if a message is sent, display it-->
    <?php include_once 'layouts/alert.php'; ?>

    <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">

      <h3 class="font-weight-bold">Account Info</h3>
      <hr class="mx-auto">
      <div class="account-info">
        <p>Name:<span> <?= $_SESSION['user_name'] ?></span></p>
        <p>Email:<span> <?= $_SESSION['user_email'] ?></span></p>
        <p><a href="my_books.php" id="my-books-btn">My books</a></p>
        <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
      </div>
    </div>

    <div class="col-lg-6 col-md-12 col-sm-12">
      <form id="account-form" method="POST" action="server/handle_change_password.php">
        <h3>Change password</h3>
        <hr class="mx-auto">
        <div class="form-group">
          <Label>Password</Label>
          <input type="password" class="form-control" id="account-password" name="password" placeholder="Password" />
        </div>
        <div class="form-group">
          <Label>Confirm Password</Label>
          <input type="password" class="form-control" id="account-confirm-password" name="confirmPassword" placeholder="Password" />
        </div>
        <div class="form-group">
          <input type="submit" value="Change Password" name="change_password" class="btn" id="change-pass-btn" />
        </div>
      </form>
    </div>

  </div>
</section>

<?php include_once 'layouts/footer.php'; ?>