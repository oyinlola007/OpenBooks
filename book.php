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
          category.name AS category_name 
      FROM 
          book 
      INNER JOIN 
          category 
      ON 
          book.category_id = category.id 
      WHERE 
          book.id = ? 
";
  $ps = $conn->prepare($stmt);
  $params = array($book_id);
  $ps->execute($params);
} else {
  header('location: index.php');
}

?>

<section class="my-5 py-5">
  <div class="container  mt-3 pt-5">

    <!-- if a message is sent, display it-->
    <?php include_once 'layouts/alert.php'; ?>

    <?php if ($book = $ps->fetch()) { ?>
      <div class="row mt-5 single-book">
        <div class="col-lg-4 col-md-6 col-sm-12">
          <img class="img-fluid w-100 pb-1" src="assets/images/books/<?= $book['book_photo'] ?>" alt=<?= $book['title'] ?> />
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 text-white">
          <h6><?= $book['category_name'] ?></h6>
          <h3 class="py-4"><?= $book['title'] ?></h3>
          <button class="buy-btn" type="button" data-bs-toggle="modal" data-bs-target="#confirmationModal">Borrow</button>

          <!-- Modal -->
          <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> -->
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
          <h4 class="my-5 mb-5">Description</h4>
          <span>
            <?= $book['description'] ?>
          </span>
        </div>

      </div>


    <?php } else {
      /**  TODO add book not found page */
    } ?>
  </div>
</section>

<section id="similar-books" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5 text-white">
    <h3>Similar books</h3>
    <hr class="mx-auto">
  </div>
  <div class="row mx-auto container-fluid">
    <?php include('server/get_popular_books.php'); ?>

    <?php while ($book = $ps->fetch()) { ?>
      <div class="book text-center col-lg-4 col-md-12 col-sm-12">
        <a href="book.php?book_id=<?= $book['id'] ?>">
          <img class="img-fluid mb-3" src="assets/images/books/<?= $book['photo'] ?>" alt=<?= $book['title'] ?> />
          <div class="star">
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