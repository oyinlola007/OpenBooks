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
  $user_id = $_GET['delete'];
  

  if ($user_id == $_SESSION['user_id']){
    $_SESSION['message'] = "You cannot delete yourself";
    $_SESSION['message_type'] = "danger";
    header('location: ../admin/user_list.php');
    exit();
  }


  if (!isset($_SESSION['logged_in'])){
    // redirect the user if they are not logged in
    $_SESSION['message'] = "You have to login to continue";
    $_SESSION['message_type'] = "danger";
    header('location: ../login.php');
    exit();

  } else{

    // Delete user picture
    $stmt = "SELECT photo FROM user WHERE id = ?";
    $ps = $conn->prepare($stmt);
    $ps->execute([$user_id]);
    $user_photo = $ps->fetchColumn();
    unlink("../assets/images/users/" . $user_photo);

    // Delete user
    $stmt = "DELETE FROM `user` WHERE `id` = ?";
    $ps = $conn->prepare($stmt);
    $params = [$user_id];


    if ($ps->execute($params)) {
        $_SESSION['message'] = "User successfully deleted";
        $_SESSION['message_type'] = "success";
        header('location: ../admin/user_list.php');
    } else {
        $_SESSION['message'] = "Error occurred while deleting user";
        $_SESSION['message_type'] = "danger";
        header('location: ../admin/user_list.php');
    }
  }
}


