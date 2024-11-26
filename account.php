<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Account</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

  <?php include_once 'layouts/header.php'; ?>

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


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>