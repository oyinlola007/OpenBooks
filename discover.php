<?php

$title = "Discover";
include_once 'layouts/header.php';

if (!isset($_SESSION['logged_in'])) {
  // redirect the user if they are not logged in
  $_SESSION['message'] = "You have to login to continue";
  $_SESSION['message_type'] = "danger";
  header('location: login.php');
  exit();
}

$stmt = "SELECT b.id, b.title, b.description, b.photo, b.available_copies, b.category_id " .
  "FROM `book` AS b " .
  "LIMIT 9;";

$ps = $conn->prepare($stmt);

$ps->execute();
?>

<section id="book-list" class="my-5 py-5">
  <div class="container mt-5 py-5 text-white">
    <h3>Find books</h3>
    <hr>
    <p>Here, you can find all books</p>
  </div>
  <div class="row mx-auto container">

    <?php while ($book = $ps->fetch()) { ?>

      <div onclick="window.location.href='book.php?book_id=<?= $book['id'] ?>';" class="book text-center col-lg-4 col-md-12 col-sm-12">
        <img class="img-fluid mb-3" src="assets/images/books/<?= $book['photo'] ?>" alt=<?= $book['title'] ?> />
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <button class="borrow-btn">Borrow Now</button>
      </div>

    <?php } ?>

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