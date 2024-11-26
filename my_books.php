<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My books</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

  <?php include_once 'layouts/header.php'; ?>


  <section class="my-books container my-5 py-5">
    <div class="container mt-5">
      <h2 class="font-weight-bold text-center">My books</h2>
      <hr class="mx-auto">
    </div>

    <table class="mt-5 pt-5 text-white">
      <tr>
        <th>Book</th>
        <th>Borrowed duration</th>
      </tr>
      <tr>
        <td>
          <div class="book-info text-center">
            <img src="assets/images/books/book1.jpg" alt="book" />
            <div>
              <p>Harry Porter</p>
              <br>
              <a class="return-btn" href="#">Return book</a>
            </div>
          </div>
        </td>
        <td>
          <span>10 days</span>
        </td>
      </tr>

      <tr>
        <td>
          <div class="book-info text-center">
            <img src="assets/images/books/book2.jpg" alt="book" />
            <div>
              <p>Harry Porter</p>
              <br>
              <a class="return-btn" href="#">Return book</a>
            </div>
          </div>
        </td>
        <td>
          <span>10 days</span>
        </td>
      </tr>

      <tr>
        <td>
          <div class="book-info text-center">
            <img src="assets/images/books/book3.jpg" alt="book" />
            <div>
              <p>Harry Porter</p>
              <br>
              <a class="return-btn" href="#">Return book</a>
            </div>
          </div>
        </td>
        <td>
          <span>10 days</span>
        </td>
      </tr>
    </table>

  </section>


  <?php include_once 'layouts/footer.php'; ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>