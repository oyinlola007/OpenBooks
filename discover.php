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

if (isset($_GET['filter']) && $_GET['filter'] != "") {
  $filter = $_GET['filter'];
  $whereClause = "WHERE c.name = '$filter'";
} else {
  $whereClause = "";
}

if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
  $page_no = $_GET['page_no'];
} else {
  $page_no = 1;
}

// Get total number of books available
$stmt = "SELECT COUNT(*) AS total_books FROM book";
$ps = $conn->prepare($stmt);
$ps->execute();
$ps = $ps->fetch();
$total_books = $ps['total_books'];

$total_books_per_page = 9;

$offset = ($page_no - 1) * $total_books_per_page;

$previous_page = $page_no - 1;
$next_page = $page_no + 1;

$adjacents = 2;

$total_no_of_pages = ceil($total_books / $total_books_per_page);



// Get all books from DB and filter by catefory if provided
$stmt = "
    SELECT 
        b.id, 
        b.title, 
        b.description, 
        b.photo, 
        b.available_copies, 
        b.category_id,
        COALESCE(CAST(AVG(r.rating) AS INT), 0) AS average_rating
    FROM 
        `book` AS b
    LEFT JOIN 
        `review` AS r ON b.id = r.book_id
    LEFT JOIN 
        `category` AS c ON b.category_id = c.id
    $whereClause
    GROUP BY 
        b.id
    LIMIT $offset, $total_books_per_page;
";


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
        <div class="star" data-rating=<?= $book['average_rating'] ?>>
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
        <li class="page-item <?php if ($page_no <= 1) {
                                echo 'disabled';
                              } ?>">
          <a class="page-link" href="<?php if ($page_no <= 1) {
                                        echo '#';
                                      } else {
                                        echo '?page_no=' . ($page_no - 1) . (isset($filter) ? '&filter=' . $filter : '');
                                      } ?>">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="?page_no=1<?php echo isset($filter) ? '&filter=' . $filter : ''; ?>">1</a></li>
        <li class="page-item"><a class="page-link" href="?page_no=2<?php echo isset($filter) ? '&filter=' . $filter : ''; ?>">2</a></li>

        <?php if ($page_no >= 3) { ?>
          <li class="page-item"><a class="page-link" href="#">...</a></li>
          <li class="page-item">
            <a class="page-link" href="<?= '?page_no=' . $page_no . (isset($filter) ? '&filter=' . $filter : ''); ?>"><?= $page_no ?></a>
          </li>
        <?php } ?>
        <li class="page-item <?php if ($page_no >= $total_no_of_pages) {
                                echo 'disabled';
                              } ?>">
          <a class="page-link" href="<?php if ($page_no >= $total_no_of_pages) {
                                        echo '#';
                                      } else {
                                        echo '?page_no=' . ($page_no + 1) . (isset($filter) ? '&filter=' . $filter : '');
                                      } ?>">Next</a>
        </li>
      </ul>
    </nav>


  </div>
</section>


<?php include_once 'layouts/footer.php'; ?>