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


if (isset($_GET['upgrade'])) {
  $user_id = $_GET['upgrade'];

  if (!isset($_SESSION['logged_in'])){
    // redirect the user if they are not logged in
    $_SESSION['message'] = "You have to login to continue";
    $_SESSION['message_type'] = "danger";
    header('location: ../login.php');
    exit();

  } else{

    // Change role of user
    $stmt = "UPDATE `user` SET `role` = 'admin' WHERE `id` = ?";
    $ps = $conn->prepare($stmt);
    $params = [$user_id];

    if ($ps->execute($params)) {
        $_SESSION['message'] = "User successfully upgraded to Admin";
        $_SESSION['message_type'] = "success";
        header('location: ../admin/user_list.php');
    } else {
        $_SESSION['message'] = "Error occurred while upgrading user to Admin";
        $_SESSION['message_type'] = "danger";
        header('location: ../admin/user_list.php');
    }
  }
}


