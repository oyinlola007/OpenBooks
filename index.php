<?php
$title = "Home";
include_once 'layouts/header.php';


$stmt = "SELECT COUNT(*) AS total_books FROM `book`";

$ps = $conn->prepare($stmt);
$ps->execute();
$ps = $ps->fetch();
$total_books = $ps['total_books'];

$stmt = "SELECT COUNT(*) AS total_users FROM `user`";

$ps = $conn->prepare($stmt);
$ps->execute();
$ps = $ps->fetch();
$total_users = $ps['total_users'];
?>

<section id="home" class="my-5 py-5">
  <div class="container  mt-3 pt-5 text-white">

    <!-- if a message is sent, display it-->
    <?php include_once 'layouts/alert.php'; ?>

    <h1 class="mt-4">Welcome to <span>openBooks</span></h1>
    <h2>Online Free eBook Library</h1>
      <p class="intro col-lg-10 col-md-10 col-sm-12">Discover a world of knowledge and stories at your fingertips. OpenBooks Online Library offers a seamless way to explore, borrow, and enjoy books from a wide range of genres. Whether you're seeking thrilling adventures, insightful knowledge, or timeless classics, our library is here to connect you with the books you love, anytime, anywhere.</p>

      <div class="stats">
        <div class="row">
          <div class="col col-lg-2 col-md-4 col-sm-6">
            <i class="fas fa-book"></i><span><?= $total_books ?></span>
          </div>
          <div class="col col-lg-2 col-md-4 col-sm-6">
            <i class="fas fa-users"></i><span><?= $total_users ?></span>
          </div>
        </div>
        <div class="row">
          <div class="col col-lg-2 col-md-4 col-sm-6">
            <p>Books Collections</p>
          </div>
          <div class="col col-lg-2 col-md-4 col-sm-6">
            <p>Customers</p>
          </div>
        </div>
      </div>

      <div>
        <a href="discover.php">
          <button class="discover">Discover &nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-right"></i></button>
        </a>
      </div>

  </div>
</section>

<section id="new-arrivals" class="my-5 pb-5">
  <div class="container text-center mt-5 py-3 text-white">
    <h3>New Arrivals</h3>
    <hr class="mx-auto">
  </div>

  <div id="carouselExampleLight" class="carousel carousel-light slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleLight" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleLight" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleLight" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">

      <?php
      $counter = 0;

      include('server/get_latest_books.php');

      while ($book = $ps->fetch()) {
        $counter++;
        // Set the active class for the first item
        $activeClass = ($counter == 1) ? 'active' : '';
      ?>

        <a href="book.php?book_id=<?= $book['id'] ?>">
          <div class="carousel-item <?php echo $activeClass; ?>">
            <div class="stackParent position-relative">
              <img src="assets/images/books/<?= $book['photo'] ?>" class="stack-Img img-fluid" alt="<?= $book['title'] ?>"/>
              <div class="stack-Txt position-absolute top-50 start-50 translate-middle text-white">
                <h1 class="card-title pb-3"><?= $book['title'] ?></h1>
                <h5 class="card-text"><?= $book['description'] ?></h5>
              </div>
            </div>
          </div>
        </a>
      <?php } ?>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleLight" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleLight" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>

<section id="popular" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5 text-white">
    <h3>Popular books</h3>
    <hr class="mx-auto">
    <p>Here, you can check out the most borrowed books</p>
  </div>

  <div class="row mx-auto container-fluid">
    <?php include('server/get_popular_books.php'); ?>

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