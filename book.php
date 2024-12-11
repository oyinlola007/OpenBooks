<?php

$title = "Book";
include_once 'layouts/header.php';

if (isset($_GET['book_id'])) {

  $book_id = $_GET['book_id'];

  $stmt = "
      SELECT 
          book.id AS book_id, 
          book.title, 
          book.description, 
          book.photo AS book_photo, 
          category.id AS category_id, 
          category.name AS category_name,
          COALESCE(CAST(AVG(review.rating) AS INT), 0) AS average_rating
      FROM 
          book 
      INNER JOIN 
          category 
      ON 
          book.category_id = category.id 
      LEFT JOIN 
          review 
      ON 
          book.id = review.book_id
      WHERE 
          book.id = ?
      GROUP BY
          book.id, category.id";

  $ps = $conn->prepare($stmt);
  $params = array($book_id);
  $ps->execute($params);

  $book = $ps->fetch();
  if ($book) {
  } else {
    header('location: index.php');
    exit();
  }
} else {
  header('location: index.php');
  exit();
}

?>

<section class="my-5 py-5">
  <div class="container  mt-3 pt-5">

    <!-- if a message is sent, display it-->
    <?php include_once 'layouts/alert.php'; ?>
    <div class="row mt-5 single-book">
      <div class="col-lg-4 col-md-6 col-sm-12">
        <img class="img-fluid w-100 pb-1" src="assets/images/books/<?= $book['book_photo'] ?>" alt=<?= $book['title'] ?> />
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 text-white">
        <h6><?= $book['category_name'] ?></h6>
        <h3 class="py-4"><?= $book['title'] ?></h3>
        <button class="borrow-btn" type="button" data-bs-toggle="modal" data-bs-target="#confirmationModal">Borrow</button>

        <!-- Modal -->
        <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-black">
                <p>Are you sure you want to borrow '<?= $book['title'] ?>'?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="server/borrow_book.php?borrow=<?= $book['book_id'] ?>" id="borrow-book-btn"><button type="button" class="btn btn-primary">Yes, borrow</button></a>
              </div>
            </div>
          </div>
        </div>
        <h4 class="my-5 mb-3">Description</h4>
        <span">
          <?= $book['description'] ?>
          </span>

          <div class="star my-5" data-rating=<?= $book['average_rating'] ?>>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
      </div>
    </div>
  </div>
</section>

<section id="similar-books" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5 text-white">
    <h3>Similar books</h3>
    <hr class="mx-auto">
  </div>
  <div class="row mx-auto container-fluid">
    <?php
    $_GET['similar_filter'] = $book['category_name'];
    $_GET['filter_book_id'] = $book['book_id'];
    include('server/get_similar_books.php')
    ?>

    <?php while ($book = $ps->fetch()) { ?>
      <div class="book text-center col-lg-4 col-md-12 col-sm-12">
        <a href="book.php?book_id=<?= $book['id'] ?>">
          <img class="img-fluid mb-3" src="assets/images/books/<?= $book['photo'] ?>" alt=<?= $book['title'] ?> />
          <div class="star" data-rating=<?= $book['average_rating'] ?>>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <button class="borrow-btn">Borrow Now</button>
        </a>
      </div>

    <?php } ?>
  </div>
</section>


<?php include_once 'layouts/footer.php'; ?>