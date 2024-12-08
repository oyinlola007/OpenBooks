<?php

session_start();

include_once 'connection.php';

if (isset($_POST['return_book'])) {
  if (!isset($_SESSION['logged_in'])) {
    // redirect the user if they are not logged in
    $_SESSION['message'] = "You have to login to continue";
    $_SESSION['message_type'] = "danger";
    header('location: ../login.php');

  } else {
    $user_email = $_SESSION['user_email'];
    $comment = $_POST['comment'];
    $rating = $_POST['rating'];
    $book_id = $_POST['book_id'];

    $return_date = date('Y-m-d'); // Current date
    $status = 'returned';

    // Fetch user_id using email
    $stmt = "SELECT id FROM user WHERE email = ?";
    $ps = $conn->prepare($stmt);
    $ps->execute([$user_email]);
    $user_id = $ps->fetchColumn();

    // Insert rating and comment if rating is not 0
    if ($rating > 0) {
      $stmt = "INSERT INTO review (book_id, user_id, rating, comment) VALUES (?, ?, ?, ?)";
      $ps = $conn->prepare($stmt);
      $params = [$book_id, $user_id, $rating, $comment];
      $ps->execute($params);
    }

    // Update the borrowed_book table to mark the book as returned
    $stmt = "UPDATE borrowed_book 
        SET return_date = ?, status = ? 
        WHERE user_id = ? AND book_id = ? AND status = 'borrowed'";
    $ps = $conn->prepare($stmt);
    $params = [$return_date, $status, $user_id, $book_id];

    if ($ps->execute($params)) {
      $_SESSION['message'] = "Book Successfully Returned";
      $_SESSION['message_type'] = "success";
      header('location: ../my_books.php');
    } else {
      $_SESSION['message'] = "Error occurred while returning the book";
      $_SESSION['message_type'] = "danger";
      header('location: ../my_books.php');
    }
  }
}
