<?php

session_start();

include_once 'connection.php';

if (isset($_POST['change_password'])) {
  $password = htmlentities($_POST['password']);
  $confirm_password = htmlentities($_POST['confirmPassword']);

  if ($password !== $confirm_password) {
    $_SESSION['message'] = "Password don't match";
    $_SESSION['message_type'] = "danger";
    header('location: ../account.php');

  } else if (strlen($password) < 8) {
    $_SESSION['message'] = "Password must be at least 8 characters";
    $_SESSION['message_type'] = "danger";
    header('location: ../account.php');
  } else{
    $password = md5($password); // hash the password
    $email = $_SESSION['user_email'];

    $stmt = "UPDATE user SET password = ? WHERE email = ?";
    $ps = $conn->prepare($stmt);
    $params = array($password, $email);

    if ($ps->execute($params)) {
      $_SESSION['message'] = "Password Successfully Updated";
      $_SESSION['message_type'] = "success";
      header('location: ../account.php');
    } else {
      $_SESSION['message'] = "Error occurred";
      $_SESSION['message_type'] = "danger";
      header('location: ../account.php');
    }
  }
}
