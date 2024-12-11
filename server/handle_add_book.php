<?php

session_start();

include_once 'connection.php';

if (isset($_POST['add-book'])) {
  $title = $_POST['book-title'];
  $description = $_POST['description'];
  $category = $_POST['category'];
  $available_copies = $_POST['available-copies'];

    // check if book exist with same title
    $stmt = "SELECT COUNT(*) FROM book WHERE title = ? ";
    $ps = $conn->prepare($stmt);
    $params = array($title);
    $ps->execute($params);

    // Check if at least one book exists
    if ($ps->fetchColumn() > 0) {
      $_SESSION['message'] = "Book with this title already exist ";
      $_SESSION['message_type'] = "danger";
      header('location: ../admin/add_book.php');
    } else {
      
      // Get the name of the uploaded file
      $photo = htmlentities($_FILES['photo']['name']);

      // Get the temporary filename of the file in which the uploaded file was stored on the server.
      $fileTemp = $_FILES['photo']['tmp_name'];

      $req = "INSERT INTO book (title, description, available_copies, category_id) VALUES (?, ?, ?, ?)";
      $ps = $conn->prepare($req);
      $params = array($title, $description, $available_copies, $category);

      if ($ps->execute($params)) {
        $book_id = $conn->lastInsertId();

        // Extract the file extension from the original file name
        $fileExtension = pathinfo($photo, PATHINFO_EXTENSION);

        // Create the new file name using the user ID
        $newFileName = $book_id . '.' . $fileExtension;

        // Move and rename the uploaded file
        $destination = '../assets/images/books/' . $newFileName;

        if (move_uploaded_file($fileTemp, $destination)) {
          // Update the database to store the renamed file path
          $updateReq = "UPDATE book SET photo = ? WHERE id = ?";
          $updatePs = $conn->prepare($updateReq);
          $updatePs->execute([$newFileName, $book_id]);

          $_SESSION['message'] = "Book Successfully Added";
          $_SESSION['message_type'] = "success";

        } else {
          $_SESSION['message'] = "Error occured while uploading book cover";
          $_SESSION['message_type'] = "danger";
        }

        header('location: ../admin/book_list.php');
        exit();
      } else {
        $_SESSION['message'] =  "Unable to Add book";
        $_SESSION['message_type'] = "danger";
        header('location: ../admin/book_list.php');
      }
    }
  
}
