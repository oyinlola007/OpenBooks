<?php

session_start();

include_once 'connection.php';

if (isset($_POST['edit-book'])) {
  $title = $_POST['book-title'];
  $book_id = $_POST['book-id'];
  $description = $_POST['description'];
  $category = $_POST['category'];
  $available_copies = $_POST['available-copies'];

  $req = "UPDATE book SET title = ?, description = ?, available_copies = ?, category_id = ? WHERE id = ?";
  $ps = $conn->prepare($req);
  $params = array($title, $description, $available_copies, $category, $book_id);

  if ($ps->execute($params)) {

    if (file_exists($_FILES['photo']['tmp_name']) && is_uploaded_file($_FILES['photo']['tmp_name'])) {
      // Get the name of the uploaded file
      $photo = htmlentities($_FILES['photo']['name']);

      // Get the temporary filename of the file in which the uploaded file was stored on the server.
      $fileTemp = $_FILES['photo']['tmp_name'];

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

        $_SESSION['message'] = "Book Successfully Updated with Cover";
        $_SESSION['message_type'] = "success";
      } else {
        $_SESSION['message'] = "Error occured while uploading book cover";
        $_SESSION['message_type'] = "danger";
      }
    } else {
      $_SESSION['message'] = "Book Successfully Updated";
      $_SESSION['message_type'] = "success";
    }
  } else {
    $_SESSION['message'] =  "Unable to Edit book";
    $_SESSION['message_type'] = "danger";
  }

  header('location: ../admin/book_list.php');
}
