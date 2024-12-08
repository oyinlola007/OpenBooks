<?php
$title = "Home";
include_once 'layouts/header.php';
?>


<section id="home">
  <div class="container">
    <h1>Welcome to <span>openBooks</span></h1>
    <h2>Online Free eBook Library</h1>
      <p class="intro col-lg-10 col-md-10 col-sm-12">Discover a world of knowledge and stories at your fingertips. OpenBooks Online Library offers a seamless way to explore, borrow, and enjoy books from a wide range of genres. Whether you're seeking thrilling adventures, insightful knowledge, or timeless classics, our library is here to connect you with the books you love, anytime, anywhere.</p>

      <div class="stats">
        <div class="row">
          <div class="col col-lg-2 col-md-4 col-sm-6">
            <i class="fas fa-book"></i><span>28+k</span>
          </div>
          <div class="col col-lg-2 col-md-4 col-sm-6">
            <i class="fas fa-users"></i><span>21,234</span>
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
          <button>Discover &nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-right"></i></button>
        </a>
      </div>

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