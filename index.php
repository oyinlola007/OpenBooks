<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

  <?php include_once 'layouts/header.php'; ?>


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

        <div><button>Discover &nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-right"></i></button></div>

    </div>
  </section>

  <section id="popular" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5 text-white">
      <h3>Featured books</h3>
      <hr class="mx-auto">
      <p>Here, you can check out the highest rated books</p>
    </div>
    <div class="row mx-auto container-fluid">

      <?php include('server/get_popular_books.php'); ?>

      <?php while ($row = $popular_books->fetch_assoc()) { ?>

        <div class="book text-center col-lg-4 col-md-12 col-sm-12">
          <img class="img-fluid mb-3" <?php echo "src=\"assets/images/books/".$row['photo']."\"" ?> alt="Book 1" />
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

  </section>

  <section id="banner">
    <div class="container">

    </div>
  </section>


  <?php include_once 'layouts/footer.php'; ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>