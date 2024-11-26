<?php
$title = "Book";
include_once 'layouts/header.php';
?>

<section class="container my-5 pt-5">
  <div class="row mt-5 single-book">
    <div class="col-lg-5 col-md-6 col-sm-12">
      <img class="img-fluid w-100 pb-1" src="assets/images/books/book1.jpg" alt="book" />
    </div>

    <div class="col-lg-6 col-md-12 col-sm1-2 text-white">
      <h6>Adventure</h6>
      <h3 class="py-4">Harry porter</h3>
      <button class="buy-btn">Borrow</button>
      <h4 class="my-5 mb-5">Description</h4>
      <span>The description of this book will be displayed shortly
        The description of this book will be displayed shortly
        The description of this book will be displayed shortly
        The description of this book will be displayed shortly
        The description of this book will be displayed shortly
      </span>
    </div>

  </div>
</section>

<section id="similar-books" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5 text-white">
    <h3>Similar books</h3>
    <hr class="mx-auto">
  </div>
  <div class="row mx-auto container-fluid">
    <div class="book text-center col-lg-4 col-md-12 col-sm-12">
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

    <div class="book text-center col-lg-4 col-md-12 col-sm-12">
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

    <div class="book text-center col-lg-4 col-md-12 col-sm-12">
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
  </div>
</section>


<?php include_once 'layouts/footer.php'; ?>
