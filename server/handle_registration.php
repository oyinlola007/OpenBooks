<?php

session_start();

include_once 'connection.php';

if (isset($_POST['register'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirmPassword'];
  $role = 'standard'; // all users set to standard-user by default

  if ($password !== $confirm_password) {
    $_SESSION['message'] = "Password don't match";
    $_SESSION['message_type'] = "danger";
    header('location: ../register.php');
  } elseif (strlen($password) < 8) {
    $_SESSION['message'] = "Password must be at least 8 characters";
    $_SESSION['message_type'] = "danger";
    header('location: ../register.php');
  } else {

    // check if user exist with same email
    $stmt = "SELECT COUNT(*) FROM user WHERE email = ? ";
    $ps = $conn->prepare($stmt);
    $params = array($email);
    $ps->execute($params);

    // Check if at least one user exists
    if ($ps->fetchColumn() > 0) {
      $_SESSION['message'] = "User with this email already exist ";
      $_SESSION['message_type'] = "danger";
      header('location: ../register.php');
    } else {
      $password = md5($password); // hash the password

      // Get the name of the uploaded file
      $photo = htmlentities($_FILES['photo']['name']);

      // Get the temporary filename of the file in which the uploaded file was stored on the server.
      $fileTemp = $_FILES['photo']['tmp_name'];

      $req = "INSERT INTO user (username, email, password, role) VALUES (?, ?, ?, ?)";
      $ps = $conn->prepare($req);
      $params = array($name, $email, $password, $role);

      if ($ps->execute($params)) {
        $userId = $conn->lastInsertId();

        // Extract the file extension from the original file name
        $fileExtension = pathinfo($photo, PATHINFO_EXTENSION);

        // Create the new file name using the user ID
        $newFileName = $userId . '.' . $fileExtension;

        // Move and rename the uploaded file
        $destination = '../assets/images/users/' . $newFileName;

        if (move_uploaded_file($fileTemp, $destination)) {
          // Update the database to store the renamed file path
          $updateReq = "UPDATE user SET photo = ? WHERE id = ?";
          $updatePs = $conn->prepare($updateReq);
          $updatePs->execute([$newFileName, $userId]);

          $_SESSION['message'] = "Registration Successful";
          $_SESSION['message_type'] = "success";

        } else {
          $_SESSION['message'] = "Image Upload Failed ";
          $_SESSION['message_type'] = "danger";
        }

        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $name;
        $_SESSION['logged_in'] = true;
        $_SESSION['profile'] = $role;
        header('location: ../account.php');
        exit();
      } else {
        $_SESSION['message'] =  "Unable to Register";
        $_SESSION['message_type'] = "danger";
        header('location: ../register.php');
      }
    }
  }
}
