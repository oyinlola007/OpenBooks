<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

  <?php include_once 'layouts/header.php'; ?>

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


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>