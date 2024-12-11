<?php

session_start();

include_once 'connection.php';

if (!isset($_SESSION['profile']) || $_SESSION['profile'] === 'standard') {
  // redirect the user if they do not have access
  $_SESSION['message'] = "You do not have access to the page";
  $_SESSION['message_type'] = "danger";
  header('location: ../index.php');
  exit();
}


if (isset($_GET['delete'])) {
  $book_id = $_GET['delete'];
  

  if (!isset($_SESSION['logged_in'])){
    // redirect the user if they are not logged in
    $_SESSION['message'] = "You have to login to continue";
    $_SESSION['message_type'] = "danger";
    header('location: ../login.php');
    exit();

  } else{

    // Delete book picture
    $stmt = "SELECT photo FROM book WHERE id = ?";
    $ps = $conn->prepare($stmt);
    $ps->execute([$book_id]);
    $book_photo = $ps->fetchColumn();
    unlink("../assets/images/books/" . $book_photo);

    // Delete user
    $stmt = "DELETE FROM `book` WHERE `id` = ?";
    $ps = $conn->prepare($stmt);
    $params = [$book_id];


    if ($ps->execute($params)) {
        $_SESSION['message'] = "Book successfully deleted";
        $_SESSION['message_type'] = "success";
        header('location: ../admin/book_list.php');
    } else {
        $_SESSION['message'] = "Error occurred while deleting book";
        $_SESSION['message_type'] = "danger";
        header('location: ../admin/book_list.php');
    }
  }
}


