<?php

$title = "My books";
include_once 'layouts/header.php';

if (!isset($_SESSION['logged_in'])) {
  // redirect the user if they are not logged in
  $_SESSION['message'] = "You have to login to continue";
  $_SESSION['message_type'] = "danger";
  header('location: login.php');
  exit();
}

$stmt = "SELECT SUM(available_copies) AS available_copies FROM book";
$ps = $conn->prepare($stmt);
$ps->execute();
$ps = $ps->fetch();
$available_copies = $ps['available_copies'];

$stmt = "SELECT COUNT(*) AS total_users FROM user";
$ps = $conn->prepare($stmt);
$ps->execute();
$ps = $ps->fetch();
$total_users = $ps['total_users'];

$stmt = "SELECT COUNT(*) AS total_borrowed FROM borrowed_book WHERE status = 'borrowed'";
$ps = $conn->prepare($stmt);
$ps->execute();
$ps = $ps->fetch();
$total_borrowed = $ps['total_borrowed'];

$stmt = "SELECT COUNT(*) AS total_returned FROM borrowed_book WHERE status = 'returned'";
$ps = $conn->prepare($stmt);
$ps->execute();
$ps = $ps->fetch();
$total_returned = $ps['total_returned'];

$stmt = "SELECT AVG(rating) AS avg_rating FROM review";
$ps = $conn->prepare($stmt);
$ps->execute();
$ps = $ps->fetch();
$avg_rating = round($ps['avg_rating'], 2);

$stmt = "SELECT 
              b.id AS book_id, 
              b.title AS title, 
              b.photo AS photo, 
              COUNT(bb.book_id) AS borrow_count
          FROM 
              borrowed_book bb
          INNER JOIN 
              book b ON bb.book_id = b.id
          GROUP BY 
              b.id, b.title, b.photo
          ORDER BY 
              borrow_count DESC
          LIMIT 1";

$ps = $conn->prepare($stmt);
$ps->execute();
$most_borrowed_book = $ps->fetch();

?>

<section class="my-5 py-5">
  <div class="user-list container mt-3 pt-5">

    <!-- if a message is sent, display it-->
    <?php include_once 'layouts/alert.php'; ?>


    <div class="container">
      <h2 class="font-weight-bold text-center">Statistics</h2>
      <hr class="mx-auto">
    </div>

    <div class="row my-5 mx-auto d-flex align-items-center justify-content-center">

      <?php $stat_val = $total_users;
      $icon_name = "fa-users";
      $stat_desc = "Total registered users"; ?>
      <?php include 'layouts/stat_card.php'; ?>

      <?php $stat_val = $available_copies;
      $icon_name = "fa-swatchbook";
      $stat_desc = "Available books"; ?>
      <?php include 'layouts/stat_card.php'; ?>

      <?php $stat_val = $total_borrowed;
      $icon_name = "fa-walking";
      $stat_desc = "Borrowed books"; ?>
      <?php include 'layouts/stat_card.php'; ?>

      <?php $stat_val = $total_returned;
      $icon_name = "fa-handshake";
      $stat_desc = "Returned books"; ?>
      <?php include 'layouts/stat_card.php'; ?>

      <?php $stat_val = $avg_rating;
      $icon_name = "fa-smile";
      $stat_desc = "Average book rating"; ?>
      <?php include 'layouts/stat_card.php'; ?>

      <?php $stat_val = "<span>" . $most_borrowed_book['title'] . "</span>";
      $icon_name = "fa-fire";
      $stat_desc = "Most borrowed book"; ?>
      <?php include 'layouts/stat_card.php'; ?>

    </div>
  </div>
</section>

<?php include_once 'layouts/footer.php'; ?>