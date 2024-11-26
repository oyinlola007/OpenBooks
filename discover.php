<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Discover</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

  <?php include_once 'layouts/header.php'; ?>


  <section id="book-list" class="my-5 py-5">
    <div class="container mt-5 py-5 text-white">
      <h3>Find books</h3>
      <hr>
      <p>Here, you can find all books</p>
    </div>
    <div class="row mx-auto container">
      <div onclick="window.location.href='single_book.php';" class="book text-center col-lg-4 col-md-12 col-sm-12">
        <img class="img-fluid mb-3" src="assets/images/books/book1.jpg" alt="Book 1" />
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <button class="borrow-btn">Borrow Now</button>
      </div>

      <div onclick="window.location.href='single_book.php';" class="book text-center col-lg-4 col-md-12 col-sm-12">
        <img class="img-fluid mb-3" src="assets/images/books/book2.jpg" alt="Book 1" />
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <button class="borrow-btn">Borrow Now</button>
      </div>

      <div onclick="window.location.href='single_book.php';" class="book text-center col-lg-4 col-md-12 col-sm-12">
        <img class="img-fluid mb-3" src="assets/images/books/book3.jpg" alt="Book 1" />
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <button class="borrow-btn">Borrow Now</button>
      </div>

      <div onclick="window.location.href='single_book.php';" class="book text-center col-lg-4 col-md-12 col-sm-12">
        <img class="img-fluid mb-3" src="assets/images/books/book1.jpg" alt="Book 1" />
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <button class="borrow-btn">Borrow Now</button>
      </div>

      <div onclick="window.location.href='single_book.php';" class="book text-center col-lg-4 col-md-12 col-sm-12">
        <img class="img-fluid mb-3" src="assets/images/books/book2.jpg" alt="Book 1" />
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <button class="borrow-btn">Borrow Now</button>
      </div>

      <div onclick="window.location.href='single_book.php';" class="book text-center col-lg-4 col-md-12 col-sm-12">
        <img class="img-fluid mb-3" src="assets/images/books/book3.jpg" alt="Book 1" />
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <button class="borrow-btn">Borrow Now</button>
      </div>

      <div onclick="window.location.href='single_book.php';" class="book text-center col-lg-4 col-md-12 col-sm-12">
        <img class="img-fluid mb-3" src="assets/images/books/book1.jpg" alt="Book 1" />
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <button class="borrow-btn">Borrow Now</button>
      </div>

      <div onclick="window.location.href='single_book.php';" class="book text-center col-lg-4 col-md-12 col-sm-12">
        <img class="img-fluid mb-3" src="assets/images/books/book2.jpg" alt="Book 1" />
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <button class="borrow-btn">Borrow Now</button>
      </div>

      <div onclick="window.location.href='single_book.php';" class="book text-center col-lg-4 col-md-12 col-sm-12">
        <img class="img-fluid mb-3" src="assets/images/books/book3.jpg" alt="Book 1" />
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <button class="borrow-btn">Borrow Now</button>
      </div>

      <nav area-label="Page navigation">
        <ul class="pagination mt-5">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>

        </ul>
      </nav>

    </div>
  </section>


  <?php include_once 'layouts/footer.php'; ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>