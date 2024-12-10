<?php

session_start();

include_once 'connection.php';


if (isset($_GET['borrow'])) {
  $book_id = $_GET['borrow'];
  $user_email = $_SESSION['user_email'];

  if (!isset($_SESSION['logged_in'])){
    // redirect the user if they are not logged in
    $_SESSION['message'] = "You have to login to continue";
    $_SESSION['message_type'] = "danger";
    header('location: ../login.php');
    exit();

    // Check if book is not available
  } else if (!isBookAvailable($conn, $book_id)){
    $_SESSION['message'] = "The book you requested is not available";
    $_SESSION['message_type'] = "warning";
    header('location: ../book.php?book_id='. $book_id );
    
    // check if book is already borrowed by user and is not yet returned
  } else if (isBookBorrowedByUser($conn, $book_id, $user_email)){
    $_SESSION['message'] = "This book is currently borrowed by user";
    $_SESSION['message_type'] = "warning";
    header('location: ../book.php?book_id='. $book_id );

  } else{
    $borrow_date = date('Y-m-d'); // Current date
    $status = 'borrowed'; // Default status
    
    // Fetch user_id using email
    $stmt = "SELECT id FROM user WHERE email = ?";
    $ps = $conn->prepare($stmt);
    $ps->execute([$user_email]);
    $user_id = $ps->fetchColumn();

    // Decrease count of available books
    $stmt = "UPDATE `book` SET `available_copies` = `available_copies` - 1 WHERE `id` = ?";
    $ps = $conn->prepare($stmt);
    $params = [$book_id];
    $ps->execute($params);

    // Insert into borrowed_book
    $stmt = "INSERT INTO borrowed_book 
        (user_id, book_id, borrow_date, status) 
        VALUES (?, ?, ?, ?)";
    $ps = $conn->prepare($stmt);
    $params = [$user_id, $book_id, $borrow_date, $status];

    if ($ps->execute($params)) {
        $_SESSION['message'] = "Book Successfully Borrowed";
        $_SESSION['message_type'] = "success";
        header('location: ../book.php?book_id='. $book_id );
    } else {
        $_SESSION['message'] = "Error occurred while borrowing the book";
        $_SESSION['message_type'] = "danger";
        header('location: ../book.php?book_id='. $book_id );
    }
  }
}

function isBookAvailable($conn, $bookId) {
  $query = "SELECT available_copies FROM book WHERE id = ?";

  $stmt = $conn->prepare($query);
  $stmt->execute([$bookId]);

  $result = $stmt->fetch();

  // Check if the book is available
  return $result && $result['available_copies'] > 0;
}

function isBookBorrowedByUser($conn, $bookId, $email) {
  $query = "
      SELECT 
          bb.id AS borrowed_id,
          bb.borrow_date,
          bb.return_date,
          bb.status
      FROM 
          borrowed_book bb
      INNER JOIN 
          user u ON bb.user_id = u.id
      WHERE 
          bb.book_id = ? AND 
          u.email = ? AND 
          bb.status = 'borrowed'
  ";

  $stmt = $conn->prepare($query);
  $stmt->execute([$bookId, $email]);

  // If any row is returned, the book is already borrowed by the user
  return $stmt->rowCount() > 0;
}



