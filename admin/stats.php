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

$stmt = "SELECT 
          book.id AS book_id, 
          book.title, 
          book.description, 
          book.available_copies,
          book.photo, 
          category.name AS category_name
        FROM book INNER JOIN category ON book.category_id = category.id";

$ps = $conn->prepare($stmt);
$ps->execute();


?>

<section class="my-5 py-5">
  <div class="user-list container mt-3 pt-5">

    <!-- if a message is sent, display it-->
    <?php include_once 'layouts/alert.php'; ?>

  </div>
</section>

<?php include_once 'layouts/footer.php'; ?>